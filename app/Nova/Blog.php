<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Markdown;
use Waynestate\Nova\CKEditor4Field\CKEditor;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;



class Blog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Blog>
     */
    public static $model = \App\Models\Blog::class;

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
            Tabs::make('Product', [

                Tab::make('Blog', [

                    Select::make('Status')
                        ->options([
                            0 => 'Pending',
                            1 => 'Active',
                            2 => 'Deleted',
                        ])->displayUsingLabels()->default(1)
                        ->sortable(),

                    Select::make('Type')
                        ->options([
                            1 => 'Xəbər',
                            2 => 'Blog',
                        ])->displayUsingLabels()->default(1)
                        ->sortable(),
                    Select::make('Category')
                        ->options([
                            \App\Models\Blog::CATEGORY_MASTERS_CLUB => __('Ustalar klubu'),
                            \App\Models\Blog::CATEGORY_CAMPAIGNS => __('Kampaniyalar'),
                            \App\Models\Blog::CATEGORY_MEETS_AND_SEMINARS => __('Görüş və seminarlar'),
                        ])->displayUsingLabels()
                        ->rules(function (NovaRequest $request) {
                            return [Rule::requiredIf($request->input('type') == 1)];
                        })
                        ->sortable(),
                    File::make('Image')->disk('public')->rules(['required', 'mimes:jpg,bmp,png'])->acceptedTypes('.jpg,.bmp,.png'),
                    Images::make('Images', 'images')->fullSize()->hideFromIndex()->singleImageRules('dimensions:min_width=100'),
                    Boolean::make('Video', 'is_video')
                        ->trueValue(true)
                        ->falseValue(false),
                    URL::make('Video URL', 'video')
                        ->rules(function (NovaRequest $request){
                            $rule = [Rule::prohibitedIf(!$request->filled('is_video') || !$request->input('is_video'))];
                            if ($request->filled('is_video') && $request->input('is_video')) {
                                $rule[] = 'url:http,https';
                            }
                            return $rule;
                        }),
                ]),


                Tab::make('Azərbaycanca', [
                    Text::make(__('Title (Azerbaijan)'), 'title_az')->hideFromIndex()
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->title['az'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $titles = $model->title ?? [];
                            $titles['az'] = $request->$requestAttribute;
                            $model->title = $titles;
                        }),
                    CKEditor::make(__('Description (Azerbaijan)'), 'description_az')->hideFromIndex()
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->description['az'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $descriptions = $model->description ?? [];
                            $descriptions['az'] = $request->$requestAttribute;
                            $model->description = $descriptions;
                        }),
                ]),



                Tab::make('English', [
                    Text::make(__('Title (English)'), 'title_en')
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->title['en'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $titles = $model->title ?? [];
                            $titles['en'] = $request->$requestAttribute;
                            $model->title = $titles;
                        }),
                    CKEditor::make(__('Description (English)'), 'description_en')->hideFromIndex()
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->description['en'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $descriptions = $model->description ?? [];
                            $descriptions['en'] = $request->$requestAttribute;
                            $model->description = $descriptions;
                        }),
                ]),

                Tab::make('Russian', [
                    Text::make(__('Title (Russian)'), 'title_ru')->hideFromIndex()
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->title['ru'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $titles = $model->title ?? [];
                            $titles['ru'] = $request->$requestAttribute;
                            $model->title = $titles;
                        }),
                    CKEditor::make(__('Description (Russian)'), 'description_ru')->hideFromIndex()
                        ->resolveUsing(function ($value, $resource) {
                            return $resource->description['ru'] ?? '';
                        })
                        ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                            $descriptions = $model->about ?? [];
                            $descriptions['ru'] = $request->$requestAttribute;
                            $model->description = $descriptions;
                        }),
                ]),



            ]),

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
}
