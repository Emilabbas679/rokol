<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SimilarProduct extends Model
{

    protected $table = 'similar_products';

    protected $fillable = [
        'product_id',
        'similar_product_id'
    ];


    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id', 'id' );
    }

    public function similar()
    {
        return $this->belongsTo( Product::class, 'similar_product_id', 'id' );
    }

}
