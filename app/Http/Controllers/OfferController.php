<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $products = Product::query()
                           ->where( 'offer_of_week', true )
                           ->orderByDesc( 'created_at' )
                            ->paginate(32);
        return view( 'offers', compact('products') );
    }
}
