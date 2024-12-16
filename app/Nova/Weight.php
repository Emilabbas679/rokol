<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Weight extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Weight>
     */
    public static $model = \App\Models\Weight::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public function title()
    {
        return $this->weight;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'weight',
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
            ID::make()->sortable(),
            Number::make('weight')->min(0)->max(1000000)->step(0.01),
            Select::make('Weight type')->options([
                '0' => 'Q',
                '1' => 'Kg',
                '2' => 'L',
            ])->sortable()->rules('required')->displayUsingLabels(),

            Select::make('Status')->options([
                '0' => 'Deaktiv',
                '1' => 'Aktiv',
                '2' => 'Silinib',
            ])->sortable()->rules('required')->displayUsingLabels(),
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
