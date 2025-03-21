<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{

    protected $fillable = [
        'product_id',
        'color_id',
    ];

    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id', 'id' );
    }

    public function color()
    {
        return $this->belongsTo( Color::class, 'color_id', 'id' );
    }

    public $timestamps = false;
}
