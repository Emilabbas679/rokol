<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOrder extends
    Model
{
    use SoftDeletes;

    const DELIVERED_STATUS_COMPLETED = 'COMPLETED';
    const DELIVERED_STATUS_PREPARING = 'PREPARING';
    const DELIVERED_STATUS_CANCELED = 'CANCELED';
    const PAYMENT_METHOD_CASH = 'CASH';
    const PAYMENT_METHOD_ONLINE = 'ONLINE';
    const PAYMENT_METHOD_CARD = 'CARD';
    const DELIVERU_PRICE = 5;


    protected $table = 'product_orders';

    protected $fillable = [
        'user_id',
        'address_id',
        'amount',
        'delivery_price',
        'delivered_status',
        'item_count',
        'payment_method',
        'total_discount'
    ];

    public function items(): HasMany
    {
        return $this->hasMany( ProductOrderItem::class, 'order_id' );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

}
