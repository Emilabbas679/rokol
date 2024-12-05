<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'property_id',
        'appearance_id',
        'weight_id',
        'count'
    ];

    public $timestamps = false;

}
