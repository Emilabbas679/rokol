<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
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
            Text::make( 'Title (EN)', 'title->en' ),
            Text::make( 'Title (RU)', 'title->ru' ),
            CKEditor::make( 'Body (AZ)', 'body->az' )
                    ->rules( [ 'required' ] ),
            CKEditor::make( 'Body (EN)', 'body->en' ),
            CKEditor::make( 'Body (RU)', 'body->ru' ),
            Image::make('image')
            ->disk('public')
            ->path('pages/images')
            ->acceptedTypes('.jpg,.png,.webp,.jpeg,.svg')
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
}
