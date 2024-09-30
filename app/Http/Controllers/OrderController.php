<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends
    Controller
{


    public function index()
    {
        $orders = ProductOrder::query()
            ->with(['items', 'items.product', 'items.price', 'items.price.weight'])
            ->where( 'user_id', fUserId() )
            ->paginate( 10 );
        return view( 'orders', compact('orders') );
    }
}
