<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

    use SoftDeletes;

    protected $table = 'messages';

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'content'
    ];
}
