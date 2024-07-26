<?php

namespace App\Models;
use Illuminate\Support\Facades\Cache;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id')->whereNull('category_id');
    }

    public function scopeParentOnly($query)
    {
        return $query->whereNull('category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id')->where('status',1);
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($translation) {
            Cache::forget("translations_{$translation->locale}");
        });

        static::deleted(function ($translation) {
            Cache::forget("translations_{$translation->locale}");
        });
    }
}
