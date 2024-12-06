<?php

namespace App\Nova;

use App\Jobs\ReOrganizeFilters;
use App\Models\Filter;
use Benjacho\BelongsToManyField\BelongsToManyField;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Traits\HasTabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Waynestate\Nova\CKEditor4Field\CKEditor;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    use HasTabs;


    public static $model = \App\Models\Product::class;

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
        'id', 'name->az'
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

            Tabs::make( 'Product', [

                Tab::make( 'Product', [


                    Text::make( __( 'Name (English)' ), 'name_en' )->hideFromIndex()
                        ->resolveUsing( function ( $value, $resource ) {
                            return $resource->name['en'] ?? '';
                        } )
                        ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                            $names       = $model->name ?? [];
                            $names['en'] = $request->$requestAttribute;
                            $model->name = $names;
                        } ),
                    Text::make( __( 'Name (Azerbaijan)' ), 'name_az' )
                        ->sortable()
                        ->resolveUsing( function ( $value, $resource ) {
                            return $resource->name['az'] ?? '';
                        } )
                        ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                            $names       = $model->name ?? [];
                            $names['az'] = $request->$requestAttribute;
                            $model->name = $names;
                        } ),
                    Text::make( __( 'Name (Russian)' ), 'name_ru' )->hideFromIndex()
                        ->resolveUsing( function ( $value, $resource ) {
                            return $resource->name['ru'] ?? '';
                        } )
                        ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                            $names       = $model->name ?? [];
                            $names['ru'] = $request->$requestAttribute;
                            $model->name = $names;
                        } ),
                    Text::make( 'Code', 'code' ),
                    Select::make( 'Status' )
                          ->options( [
                                         0 => 'Pending',
                                         1 => 'Active',
                                         2 => 'Deleted',
                                     ] )->displayUsingLabels()
                          ->sortable(),
                    BelongsTo::make( 'Category', 'category', 'App\Nova\Category' )
                             ->nullable()
                             ->relatableQueryUsing( function ( NovaRequest $request, Builder $query ) {
                                 $query->whereNot( 'category_id', null );
                             } )
                             ->display( function ( $category ) {
                                 return $category->name[app()->getLocale()] ?? '';
                             } ),
                    Number::make( 'Stock count', 'stock_count' )->default( 0 )->sortable(),
                    File::make( 'Image' )->disk( 'public' ),

                    Tag::make( 'Types', 'types', 'App\Nova\Type' )
                       ->preload()
                       ->nullable(),

                    Tag::make( 'Appearances', 'appearances', 'App\Nova\Appearance' )
                       ->preload()
                       ->nullable(),

                    Tag::make( 'Property', 'refProperties', 'App\Nova\Property' )
                       ->preload()
                       ->nullable(),


                    Tag::make( 'Application Areas', 'applicationAreas', 'App\Nova\ApplicationArea' )
                       ->preload()
                       ->nullable(),

                    Tag::make( 'Weights', 'weights', 'App\Nova\Weight' )->preload()->nullable(),

                    HasMany::make( 'Variations', 'prices', ProductPrice::class ),
                    Boolean::make( __( 'Offer of week' ), 'offer_of_week' ),
                ] ),
                Tab::make( 'Haqqında', [
                    CKEditor::make( __( 'About (English)' ), 'about_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->about['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $abouts       = $model->about ?? [];
                                $abouts['en'] = $request->$requestAttribute;
                                $model->about = $abouts;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'About (Azerbaijan)' ), 'about_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->about['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $abouts       = $model->about ?? [];
                                $abouts['az'] = $request->$requestAttribute;
                                $model->about = $abouts;
                            } ),
                    CKEditor::make( __( 'About (Russian)' ), 'about_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->about['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $abouts       = $model->about ?? [];
                                $abouts['ru'] = $request->$requestAttribute;
                                $model->about = $abouts;
                            } ),
                ] ),
                Tab::make( 'İstifadə sahələri', [
                    CKEditor::make( __( 'Usage (English)' ), 'usage_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usages       = $model->usage ?? [];
                                $usages['en'] = $request->$requestAttribute;
                                $model->usage = $usages;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Usage (Azerbaijan)' ), 'usage_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usages       = $model->usage ?? [];
                                $usages['az'] = $request->$requestAttribute;
                                $model->usage = $usages;
                            } ),
                    CKEditor::make( __( 'Usage (Russian)' ), 'usage_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usages       = $model->usage ?? [];
                                $usages['ru'] = $request->$requestAttribute;
                                $model->usage = $usages;
                            } ),
                ] ),
                Tab::make( 'İstifadə qaydaları', [
                    CKEditor::make( __( 'Usage rules (English)' ), 'usage_rules_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage_rules['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usage_rules        = $model->usage_rules ?? [];
                                $usage_rules['en']  = $request->$requestAttribute;
                                $model->usage_rules = $usage_rules;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Usage rules (Azerbaijan)' ), 'usage_rules_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage_rules['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usage_rules        = $model->usage_rules ?? [];
                                $usage_rules['az']  = $request->$requestAttribute;
                                $model->usage_rules = $usage_rules;
                            } ),
                    CKEditor::make( __( 'Usage rules (Russian)' ), 'usage_rules_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->usage_rules['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $usage_rules        = $model->usage_rules ?? [];
                                $usage_rules['ru']  = $request->$requestAttribute;
                                $model->usage_rules = $usage_rules;
                            } ),
                ] ),
                Tab::make( 'Üstünlükləri', [
                    CKEditor::make( __( 'Advantage (English)' ), 'advantage_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->advantage['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $advantages       = $model->advantage ?? [];
                                $advantages['en'] = $request->$requestAttribute;
                                $model->advantage = $advantages;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Advantage (Azerbaijan)' ), 'advantage_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->advantage['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $advantages       = $model->advantage ?? [];
                                $advantages['az'] = $request->$requestAttribute;
                                $model->advantage = $advantages;
                            } ),
                    CKEditor::make( __( 'Advantage (Russian)' ), 'advantage_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->advantage['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $advantages       = $model->advantage ?? [];
                                $advantages['ru'] = $request->$requestAttribute;
                                $model->advantage = $advantages;
                            } ),
                ] ),
                Tab::make( 'Tətbiqi', [
                    CKEditor::make( __( 'Apply (English)' ), 'apply_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->apply['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $applies       = $model->apply ?? [];
                                $applies['en'] = $request->$requestAttribute;
                                $model->apply  = $applies;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Apply (Azerbaijan)' ), 'apply_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->apply['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $applies       = $model->apply ?? [];
                                $applies['az'] = $request->$requestAttribute;
                                $model->apply  = $applies;
                            } ),
                    CKEditor::make( __( 'Apply (Russian)' ), 'apply_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->apply['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $applies       = $model->apply ?? [];
                                $applies['ru'] = $request->$requestAttribute;
                                $model->apply  = $applies;
                            } ),
                ] ),
                Tab::make( 'Texniki göstəriciləri', [
                    CKEditor::make( __( 'Properties (English)' ), 'properties_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->properties['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $propertiess       = $model->properties ?? [];
                                $propertiess['en'] = $request->$requestAttribute;
                                $model->properties = $propertiess;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Properties (Azerbaijan)' ), 'properties_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->properties['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $propertiess       = $model->properties ?? [];
                                $propertiess['az'] = $request->$requestAttribute;
                                $model->properties = $propertiess;
                            } ),
                    CKEditor::make( __( 'Properties (Russian)' ), 'properties_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->properties['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $propertiess       = $model->properties ?? [];
                                $propertiess['ru'] = $request->$requestAttribute;
                                $model->properties = $propertiess;
                            } ),
                ] ),
                Tab::make( 'Sərfiyyat', [
                    CKEditor::make( __( 'Consumption (English)' ), 'consumption_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->consumption['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $consumptions       = $model->consumption ?? [];
                                $consumptions['en'] = $request->$requestAttribute;
                                $model->consumption = $consumptions;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Consumption (Azerbaijan)' ), 'consumption_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->consumption['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $consumptions       = $model->consumption ?? [];
                                $consumptions['az'] = $request->$requestAttribute;
                                $model->consumption = $consumptions;
                            } ),
                    CKEditor::make( __( 'Consumption (Russian)' ), 'consumption_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->consumption['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $consumptions       = $model->consumption ?? [];
                                $consumptions['ru'] = $request->$requestAttribute;
                                $model->consumption = $consumptions;
                            } ),
                    Number::make( 'Recommended Layers', 'recommended_layers' )->hideFromIndex(),
                    Number::make( 'Consumption norm', 'consumption_norm' )->step( '0.01' )->hideFromIndex(),
                    Boolean::make( 'Dimension changeable', 'dimension_changeable' )->hideFromIndex()

                ] ),
                Tab::make( 'Saxlama müddəti', [
                    CKEditor::make( __( 'Retention (English)' ), 'retention_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->retention['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $retentions       = $model->retention ?? [];
                                $retentions['en'] = $request->$requestAttribute;
                                $model->retention = $retentions;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Retention (Azerbaijan)' ), 'retention_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->retention['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $retentions       = $model->retention ?? [];
                                $retentions['az'] = $request->$requestAttribute;
                                $model->retention = $retentions;
                            } ),
                    CKEditor::make( __( 'Retention (Russian)' ), 'retention_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->retention['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $retentions       = $model->retention ?? [];
                                $retentions['ru'] = $request->$requestAttribute;
                                $model->retention = $retentions;
                            } ),
                ] ),
                Tab::make( 'Xəbərdarlıqlar', [
                    CKEditor::make( __( 'Warning (English)' ), 'warning_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->warning['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $warnings       = $model->warning ?? [];
                                $warnings['en'] = $request->$requestAttribute;
                                $model->warning = $warnings;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Warning (Azerbaijan)' ), 'warning_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->warning['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $warnings       = $model->warning ?? [];
                                $warnings['az'] = $request->$requestAttribute;
                                $model->warning = $warnings;
                            } ),
                    CKEditor::make( __( 'Warning (Russian)' ), 'warning_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->warning['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $warnings       = $model->warning ?? [];
                                $warnings['ru'] = $request->$requestAttribute;
                                $model->warning = $warnings;
                            } ),
                ] ),
                Tab::make( 'Zəmanət', [
                    CKEditor::make( __( 'Guarantee (English)' ), 'guarantee_en' )
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->guarantee['en'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $guarantees       = $model->guarantee ?? [];
                                $guarantees['en'] = $request->$requestAttribute;
                                $model->guarantee = $guarantees;
                            } )->hideFromIndex(),
                    CKEditor::make( __( 'Guarantee (Azerbaijan)' ), 'guarantee_az' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->guarantee['az'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $guarantees       = $model->guarantee ?? [];
                                $guarantees['az'] = $request->$requestAttribute;
                                $model->guarantee = $guarantees;
                            } ),
                    CKEditor::make( __( 'Guarantee (Russian)' ), 'guarantee_ru' )->hideFromIndex()
                            ->resolveUsing( function ( $value, $resource ) {
                                return $resource->guarantee['ru'] ?? '';
                            } )
                            ->fillUsing( function ( NovaRequest $request, $model, $attribute, $requestAttribute ) {
                                $guarantees       = $model->guarantee ?? [];
                                $guarantees['ru'] = $request->$requestAttribute;
                                $model->guarantee = $guarantees;
                            } ),
                ] ),
                Tab::make( 'Video', [
                    Text::make( 'Video' )->rules( 'nullable' ),
                ] ),
                Tab::make( 'Color', [
                    Select::make( 'Has color', 'has_colors' )
                          ->options( [
                                         \App\Models\Product::NO_COLORS   => 'No',
                                         \App\Models\Product::SPEC_COLORS => 'Some colors',
                                         \App\Models\Product::ALL_COLORS  => 'All colors',
                                         \App\Models\Product::MAIN_COLORS => 'Main colors',
                                     ] )->displayUsingLabels()
                          ->sortable(),
                ] ),
                Tab::make( 'Brand', [
                    BelongsTo::make( 'Brand', 'brand', Brand::class )
                             ->display( function ( $category ) {
                                 return $category->name ?? '';
                             } ),
                ] ),
            ] ),
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

    public static function afterUpdate( NovaRequest $request, Model $model )
    {
        ReOrganizeFilters::dispatch();
    }

    public static function afterCreate( NovaRequest $request, Model $model )
    {
        ReOrganizeFilters::dispatch();
    }

    public static function afterDelete( NovaRequest $request, Model $model )
    {
        ReOrganizeFilters::dispatch();
    }


}
