<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'body',
        'image',
        'active_status',
        'under_news',
    ];

    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];
}
