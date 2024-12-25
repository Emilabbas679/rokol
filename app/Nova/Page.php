<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Waynestate\Nova\CKEditor4Field\CKEditor;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Page>
     */
    public static $model = \App\Models\Page::class;

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
        'title'
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
            Text::make( 'Title (AZ)', 'title->az' )->rules( [ 'required' ] ),
            Text::make( 'Title (EN)', 'title->en' )->hideFromIndex(),
            Text::make( 'Title (RU)', 'title->ru' )->hideFromIndex(),
            CKEditor::make( 'Body (AZ)', 'body->az' )
                    ->rules( [ 'required' ] ),
            CKEditor::make( 'Body (EN)', 'body->en' )->hideFromIndex(),
            CKEditor::make( 'Body (RU)', 'body->ru' )->hideFromIndex(),
            Boolean::make( 'Under news', 'under_news' )
                   ->falseValue( 0 )
                   ->trueValue( 1 ),
            Image::make( 'image' )
                 ->hideFromIndex()
                 ->disk( 'public' )
                 ->path( 'pages/images' )
                 ->acceptedTypes( '.jpg,.png,.webp,.jpeg,.svg' )
                 ->rules(
                     [
                         'nullable',
                         'mimetypes:image/jpeg,image/png,image/webp',
                     ]
                 ),
            Boolean::make( 'Active status', 'active_status' )
                   ->trueValue( true )
                   ->falseValue( false ),
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
        Cache::forget( 'staticpages' );
        Cache::rememberForever( "staticpages", function () {
            return \App\Models\Page::query()
                                   ->where( 'active_status', 1 )
                                   ->get( [ 'id', 'title', 'under_news' ] );
        } );
    }

    public static function afterUpdate( NovaRequest $request, Model $model )
    {
        Cache::forget( 'staticpages' );
        Cache::rememberForever( "staticpages", function () {
            return \App\Models\Page::query()
                                   ->where( 'active_status', 1 )
                                   ->get( [ 'id', 'title', 'under_news' ] );
        } );
    }

    public static function afterDelete( NovaRequest $request, Model $model )
    {
        Cache::forget( 'staticpages' );
        Cache::rememberForever( "staticpages", function () {
            return \App\Models\Page::query()
                                   ->where( 'active_status', 1 )
                                   ->get( [ 'id', 'title', 'under_news' ] );
        } );
    }

    public static function afterRestore( NovaRequest $request, Model $model )
    {
        Cache::forget( 'staticpages' );
        Cache::rememberForever( "staticpages", function () {
            return \App\Models\Page::query()
                                   ->where( 'active_status', 1 )
                                   ->get( [ 'id', 'title', 'under_news' ] );
        } );
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
