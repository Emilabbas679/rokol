<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

//use App\Models\Type;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
        'about' => 'array',
        'usage' => 'array',
        'advantage' => 'array',
        'properties' => 'array',
        'consumption' => 'array',
        'retention' => 'array',
        'warning' => 'array',
        'guarantee' => 'array',
        'apply' => 'array',
        'usage_rules' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'product_types', 'product_id', 'type_id');
    }
    public function appearances()
    {
        return $this->belongsToMany(Appearance::class, 'product_appearances', 'product_id', 'appearance_id');
    }

    public function refProperties()
    {
        return $this->belongsToMany(Property::class, 'product_properties', 'product_id', 'property_id');
    }
    public function applicationAreas()
    {
        return $this->belongsToMany(ApplicationArea::class, 'product_application_areas', 'product_id', 'application_area_id');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }


    public function favorite(): HasOne
    {
        return $this->hasOne( Favorite::class )->where( 'user_id', fUserId() );
    }


}
