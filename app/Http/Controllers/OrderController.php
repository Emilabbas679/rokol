<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderController extends
    Controller
{


    public function index()
    {
        $orders = ProductOrder::query()
            ->with(['items', 'items.product', 'items.price', 'items.price.weight'])
            ->where( 'user_id', fUserId() )
            ->when(\request()->filled('status'), function (Builder $builder) {
                $builder->where('delivered_status', \request()->input('status'));
            })
            ->orderByDesc('created_at')
            ->paginate( 40 );
        return view( 'orders', compact('orders') );
    }
}
