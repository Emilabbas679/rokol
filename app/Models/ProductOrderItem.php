<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductOrderItem extends
    Model
{

    protected $table = 'product_order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_price_id',
        'count'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo( Product::class );
    }

    public function price(): BelongsTo
    {
        return $this->belongsTo( ProductPrice::class, 'product_price_id' );
    }
}
