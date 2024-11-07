<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_price_id',
        'color_id',
        'count',
        'status'
    ];

    const STATUS_UNCOMPLETED = 1;
    const STATUS_COMPLETED = 2;


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productPrice(): BelongsTo
    {
        return $this->belongsTo(ProductPrice::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo( Color::class );
    }
}
