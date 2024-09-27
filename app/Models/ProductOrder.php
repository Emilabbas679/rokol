<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOrder extends Model
{
    use SoftDeletes;

    const DELIVERED_STATUS_COMPLETED = 'COMPLETED';
    const DELIVERED_STATUS_PREPARING = 'PREPARING';
    const DELIVERED_STATUS_CANCELED = 'CANCELED';
    const PAYMENT_METHOD_CASH = 'CASH';
    const PAYMENT_METHOD_ONLINE = 'ONLINE';
    const PAYMENT_METHOD_CARD = 'CARD';

    protected $table = 'product_orders';



}
