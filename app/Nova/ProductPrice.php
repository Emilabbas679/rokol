<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class ProductPrice extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ProductPrice>
     */
    public static $model = \App\Models\ProductPrice::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields( NovaRequest $request )
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make( 'Product' )->display( function ( $item ) {
                return $item->name[app()->getLocale()] ?? '';
            } ),

            BelongsTo::make( 'Weight' )->display( function ( $item ) {

                $weight = $item->weight ?? '';
                $type   = productWeightUnit( $item->weight_type );

                return $weight . ' ' . $type;
            } ),

            Number::make( 'Price' )
                  ->step( 0.01 )
                  ->rules( 'required', 'numeric', 'min:0' ),

            Number::make( 'Sale Price' )
                  ->step( 0.01 )
                  ->rules( 'nullable', 'numeric', 'min:0' )->default( 0 ),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions( NovaRequest $request )
    {
        return [];
    }


    public static function authorizeToCreate(Request $request)
    {
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }

    public static function authorizedToCreate(Request $request)
    {
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }

    public function authorizedToDelete(Request $request)
    {
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }


    public function authorizedToReplicate(Request $request)
    {
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }

    public static function availableForNavigation(Request $request)
    {
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }

    public function availablePanelsForCreate( $request, FieldCollection $fields = null )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] )
            ? parent::availablePanelsForCreate( $request, $fields )
            : false;
    }
}
