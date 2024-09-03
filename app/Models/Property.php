<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
    ];



    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_properties', 'property_id', 'product_id');
    }
}
