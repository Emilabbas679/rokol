<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'site_name',
        'site_logo',
        'social_media',
        'phone_number_short',
        'phone_number_long',
        'email_contact',
        'email_footer',
        'address_contact',
        'address_footer'
    ];

    protected $casts = [
        'social_media' => 'array'
    ];
}
