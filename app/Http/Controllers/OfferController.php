<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index()
    {
        $products = Product::query()
                           ->select( [
                                         'products.id',
                                         'products.status',
                                         'products.category_id',
                                         'products.image',
                                         'products.name',
                                         'products.offer_of_week',
                                         'products.created_at',
                                         DB::raw( 'pp.id as price_id' ),
                                         'pp.sale_price',
                                         'pp.price',
                                         'pp.weight_id',
                                         'w.weight_type',
                                         'w.weight'
                                     ] )
                           ->join( DB::raw( 'product_prices pp' ), 'pp.product_id', '=', 'products.id' )
                           ->join( DB::raw( 'weights as w' ), 'w.id', '=', 'pp.weight_id' )
                           ->where( 'products.offer_of_week', true )
                           ->orderByDesc( 'products.created_at' )
                           ->paginate( 32 );
        return view( 'offers', compact( 'products' ) );
    }
}
