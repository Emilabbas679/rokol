<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ApplicationArea extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::saved(function ($translation) {
//            Cache::forget("translations_{$translation->locale}");
//        });
//
//        static::deleted(function ($translation) {
//            Cache::forget("translations_{$translation->locale}");
//        });
//    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_application_areas', 'application_area_id', 'product_id');
    }
}
