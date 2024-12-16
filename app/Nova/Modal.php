<?php

namespace App\Nova;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class Modal extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Modal>
     */
    public static $model = \App\Models\Modal::class;

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
            Image::make( 'Image', 'image_path' )
                 ->rules( [
                              Rule::requiredIf( $request->filled( 'is_video' ) && $request->input( 'is_video' ) === '0' ),
                              'mimetypes:image/jpeg,image/png,image/webp',
                              'max:2048'
                          ] ),
            URL::make( 'Video', 'video_url' )
               ->rules( [
                            Rule::requiredIf( $request->filled( 'is_video' ) && $request->input( 'is_video' ) === '1' ),
                            'nullable',
                            'url:https'
                        ] ),
            URL::make( 'Redirect url', 'redirect_url' )
               ->rules( [
                            Rule::requiredIf( $request->filled( 'is_video' ) && $request->input( 'is_video' ) === '0' ),
                            'nullable',
                            'url:http,https'
                        ] ),
            Boolean::make( 'Is video', 'is_video' )
                   ->trueValue( true )
                   ->falseValue( false ),
            DateTime::make( 'Expire', 'expire_time' )
                    ->min( now() )
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


    public static function authorizeToCreate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public static function authorizedToCreate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public function authorizedToDelete( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }


    public function authorizedToReplicate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public static function availableForNavigation( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public function availablePanelsForCreate( $request, FieldCollection $fields = null )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] )
            ? parent::availablePanelsForCreate( $request, $fields )
            : false;
    }
}
