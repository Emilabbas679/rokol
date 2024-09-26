<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddProductRequest;
use App\Models\Cart;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::query()
            ->with(['product', 'productPrice.color', 'productPrice.weight'])
            ->where('user_id', auth()->id())
            ->where('status', Cart::STATUS_UNCOMPLETED)
            ->paginate(20);

        return view('cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function addProduct(CartAddProductRequest $request)
    {
        $validated = collect($request->validated());
        $productPriceId = ProductPrice::query()
            ->select('id')
            ->where('product_id', $validated->get('product_id'))
            ->where('color_id', $validated->get('color_id'))
            ->where('weight_id', $validated->get('weight_id'))
            ->first()
            ->id;

        Cart::query()->create([
            'user_id' => fUserId(),
            'product_id' => $validated->get('product_id'),
            'product_price_id' => $productPriceId,
            'count' => $validated->get('count'),
            'status' => Cart::STATUS_UNCOMPLETED
        ]);


    }
}
