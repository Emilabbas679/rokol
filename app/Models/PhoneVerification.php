<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVerification extends
    Model
{
    protected $table = 'phone_verification';


    protected $fillable = [
        'phone',
        'code',
        'status',
        'created_at'
    ];

    public $timestamps = false;
}
