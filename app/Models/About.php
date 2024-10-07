<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];
}
