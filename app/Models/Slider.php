<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    protected $table = 'sliders';

    protected $fillable = [
        'header',
        'content',
        'url',
        'order',
        'image'
    ];

    protected $casts = [
        'header' => 'array',
        'content' => 'array'
    ];
}
