<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Catalog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Catalog>
     */
    public static $model = \App\Models\Catalog::class;

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
            Text::make( 'name', 'name' ),
            File::make( 'File', 'path' )
                ->disk( 'public' ),
            Image::make('Image', 'image')
                ->disk('public'),

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
        return $request->user()?->hasRole(['Main admin', 'Admin 1']);
    }

}
