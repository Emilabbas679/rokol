<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource;
use Laravel\Nova\Fields\Select;


class Translation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Translation>
     */
    public static $model = \App\Models\Translation::class;

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
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Select::make('Locale')->options([
                'az' => 'Azerbaijani',
                'en' => 'English',
                'ru' => 'Russian',
            ])->sortable()->rules('required'),
            Text::make('Key')->sortable()->rules('required'),
            Textarea::make('Value')->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
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
