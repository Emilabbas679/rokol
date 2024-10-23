<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id',
        'product_id',
        'price_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo( Product::class );
    }


    public function productPrice(): BelongsTo
    {
        return $this->belongsTo( ProductPrice::class, 'price_id', 'id' );
    }



}
