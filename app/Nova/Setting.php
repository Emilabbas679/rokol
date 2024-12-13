<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class Setting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Setting>
     */
    public static $model = \App\Models\Setting::class;

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
            Text::make( 'Site name', 'site_name' ),
            Image::make( 'Site logo', 'site_logo' )
                ->hideFromIndex()
                ->acceptedTypes('.jpg,.png,.svg,.webp,.jpeg,.svg')
                 ->rules( [
                              'nullable',
                              'mimetypes:image/jpeg,image/png,image/webp,image/svg+xml',
                              'max:2048'
                          ] ),
            URL::make( 'Facebook', 'social_media->facebook' )
               ->hideFromIndex()
               ->rules( [
                            'url:http,https'
                        ] ),
            URL::make( 'Whatsapp', 'social_media->whatsapp' )
               ->hideFromIndex()
               ->rules( [
                            'url:http,https'
                        ] ),
            URL::make( 'Instagram', 'social_media->instagram' )
               ->hideFromIndex()
               ->rules( [
                            'url:http,https'
                        ] ),
            URL::make( 'Linkedin', 'social_media->linkedin' )
               ->hideFromIndex()
               ->rules( [
                            'url:http,https'
                        ] ),
            URL::make( 'Youtube', 'social_media->youtube' )
               ->hideFromIndex()
               ->rules( [
                            'url:http,https'
                        ] ),
            Text::make( 'Phone number short', 'phone_number_short' ),
            Text::make( 'Phone number long', 'phone_number_long' ),
            Text::make( 'Email contact', 'email_contact' )
                ->rules( [ 'email' ] ),
            Text::make( 'Email footer', 'email_footer' )
                ->rules( [ 'email' ] ),
            Text::make( 'Address contact', 'address_contact' ),
            Text::make( 'Address footer', 'address_footer' ),
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


    public static function afterCreate( NovaRequest $request, Model $model )
    {
        Cache::forget( 'settings' );
        Cache::rememberForever( 'settings', function () {
            return \App\Models\Setting::query()->first();
        } );
    }


    public static function authorizedToCreate(Request $request)
    {
        return !\App\Models\Setting::query()->count();
    }


    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

}
