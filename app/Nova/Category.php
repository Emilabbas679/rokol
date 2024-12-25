<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;
use Stepanenko3\NovaJson\Fields\JsonArray;
use Stepanenko3\NovaJson\Fields\JsonRepeatable;
use Illuminate\Database\Eloquent\Builder;


class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Category>
     */
    public static $model = \App\Models\Category::class;

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
            ID::make()->sortable(),


            Text::make(__('Name (English)'), 'name_en')
                ->resolveUsing(function ($value, $resource) {
                    return $resource->name['en'] ?? '';
                })
                ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                    $names = $model->name ?? [];
                    $names['en'] = $request->$requestAttribute;
                    $model->name = $names;
                }),

            Text::make(__('Name (Azerbaijan)'), 'name_az')->hideFromIndex()
                ->resolveUsing(function ($value, $resource) {
                    return $resource->name['az'] ?? '';
                })
                ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                    $names = $model->name ?? [];
                    $names['az'] = $request->$requestAttribute;
                    $model->name = $names;
                }),

            Text::make(__('Name (Russian)'), 'name_ru')->hideFromIndex()
                ->resolveUsing(function ($value, $resource) {
                    return $resource->name['ru'] ?? '';
                })
                ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                    $names = $model->name ?? [];
                    $names['ru'] = $request->$requestAttribute;
                    $model->name = $names;
                }),




            Select::make('Status')
                ->options([
                    0 => 'Pending',
                    1 => 'Active',
                    2 => 'Deleted',
                ])->displayUsingLabels()
                ->sortable(),



            BelongsTo::make('Parent', 'parent', 'App\Nova\Category')
                ->nullable()
                ->display(function ($category) {
                    return $category->name[app()->getLocale()] ?? '';
                })->relatableQueryUsing(function (NovaRequest $request, Builder $query) {
                    $query->where('category_id', null);
                }),



            HasMany::make('Children', 'children', 'App\Nova\Category'),


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


    public static function afterCreate( NovaRequest $request, Model $model )
    {
        Cache::forget( 'categories' );
        Cache::remember( 'categories', 1200, function () {
            return \App\Models\Category::query()
                           ->with( [ 'children' ] )
                           ->where( 'status', 1 )
                           ->where( 'category_id', null )
                           ->get();
        } );
    }

    public static function afterUpdate( NovaRequest $request, Model $model )
    {
        Cache::forget( 'categories' );
        Cache::remember( 'categories', 1200, function () {
            return \App\Models\Category::query()
                           ->with( [ 'children' ] )
                           ->where( 'status', 1 )
                           ->where( 'category_id', null )
                           ->get();
        } );
    }

    public static function afterDelete( NovaRequest $request, Model $model )
    {
        Cache::forget( 'categories' );
        Cache::remember( 'categories', 1200, function () {
            return \App\Models\Category::query()
                           ->with( [ 'children' ] )
                           ->where( 'status', 1 )
                           ->where( 'category_id', null )
                           ->get();
        } );
    }

    public static function afterRestore( NovaRequest $request, Model $model )
    {
        Cache::forget( 'categories' );
        Cache::remember( 'categories', 1200, function () {
            return \App\Models\Category::query()
                           ->with( [ 'children' ] )
                           ->where( 'status', 1 )
                           ->where( 'category_id', null )
                           ->get();
        } );
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
