<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $table = 'modals';

    protected $fillable = [
        'image_path',
        'video_url',
        'redirect_url',
        'is_video',
        'expire_time',
    ];

    protected $casts = [
        'expire_time' => 'datetime'
    ];
}
