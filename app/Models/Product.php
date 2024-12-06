<?php

namespace App\Models;

use Benjacho\BelongsToManyField\HasBelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use App\Models\Type;


class Product extends Model
{
    use HasBelongsToMany;

    const NO_COLORS = 0;
    const SPEC_COLORS = 1;
    const ALL_COLORS = 2;
    const MAIN_COLORS = 3;

    protected $guarded = [];

    protected $casts = [
        'name'        => 'array',
        'about'       => 'array',
        'usage'       => 'array',
        'advantage'   => 'array',
        'properties'  => 'array',
        'consumption' => 'array',
        'retention'   => 'array',
        'warning'     => 'array',
        'guarantee'   => 'array',
        'apply'       => 'array',
        'usage_rules' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo( Category::class, 'category_id' );
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany( Type::class, 'product_types', 'product_id', 'type_id' );
    }

    public function appearances(): BelongsToMany
    {
        return $this->belongsToMany( Appearance::class, 'product_appearances', 'product_id', 'appearance_id' );
    }

    public function refProperties(): BelongsToMany
    {
        return $this->belongsToMany( Property::class, 'product_properties', 'product_id', 'property_id' );
    }

    public function applicationAreas(): BelongsToMany
    {
        return $this->belongsToMany( ApplicationArea::class, 'product_application_areas', 'product_id', 'application_area_id' );
    }

    public function prices()
    {
        return $this->hasMany( ProductPrice::class );
    }

    public function weights(): BelongsToMany
    {
        return $this->belongsToMany( Weight::class, 'product_prices' );
    }


    public function favorites(): HasMany
    {
        return $this->hasMany( Favorite::class )->where( 'user_id', fUserId() );
    }

    public function similar(): BelongsToMany
    {
        return $this->belongsToMany( self::class, SimilarProduct::class, 'product_id', 'similar_product_id', null, null, 'products' );
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany( Color::class, 'product_colors' );
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo( Brand::class );
    }

//    protected static function boot()
//    {
//        parent::boot();
//        static::saved(function () {
//            Artisan::call( 'app:create-filters' );
//        });
//
//        static::deleted(function () {
//            Artisan::call( 'app:create-filters' );
//        });
//
//        static::updated( function () {
//            Artisan::call( 'app:create-filters' );
//        });
//    }

}
