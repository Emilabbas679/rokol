<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddProductRequest;
use App\Http\Requests\CartCompleteRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\ProductOrder;
use App\Models\ProductOrderItem;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::query()
            ->with( [ 'product',
                      'productPrice.color',
                      'productPrice.weight' ] )
            ->where( 'user_id', auth()->id() )
            ->where( 'status', Cart::STATUS_UNCOMPLETED )
            ->paginate( 20 );

        return view( 'cart', compact( 'carts' ) );
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
    public function store( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request,
                            string  $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id )
    {
        Cart::query()
            ->where( 'user_id', fUserId() )
            ->findOrFail( $id )
            ->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function addProduct( CartAddProductRequest $request )
    {
        $validated = collect( $request->validated() );
        $productPriceId = ProductPrice::query()
            ->select( 'id' )
            ->where( 'product_id', $validated->get( 'product_id' ) )
            ->where( 'color_id', $validated->get( 'color_id' ) )
            ->where( 'weight_id', $validated->get( 'weight_id' ) )
            ->first()->id;

        Cart::query()
            ->updateOrCreate( [ 'user_id'          => fUserId(),
                                'product_id'       => $validated->get( 'product_id' ),
                                'product_price_id' => $productPriceId,
                                'status'           => Cart::STATUS_UNCOMPLETED ],
                              [
                                  'count' => DB::raw( 'count + ' . $validated->get( 'count' ) ),
                              ] );

    }

    public function selectAddress()
    {
        $addresses = Address::query()
            ->where( 'user_id', fUserId() )
            ->get();
        $carts = Cart::query()
            ->with( [ 'product',
                      'productPrice.color',
                      'productPrice.weight' ] )
            ->where( 'user_id', auth()->id() )
            ->where( 'status', Cart::STATUS_UNCOMPLETED )
            ->paginate( 20 );

        return view( 'checkout_address', compact( 'addresses', 'carts' ) );
    }

    public function completeCart( CartCompleteRequest $request )
    {
        $validated = collect( $request->validated() );
        $deliveryPrice = $validated->has( 'select_address' ) && $validated->get( 'select_address' ) === 'address' ? 5 : 0;
        $carts = Cart::query()
            ->with( [ 'product',
                      'productPrice.color',
                      'productPrice.weight' ] )
            ->where( 'user_id', auth()->id() )
            ->where( 'status', Cart::STATUS_UNCOMPLETED )
            ->get();
        $amount = $carts->sum( fn( $cart ) => $cart->productPrice->price * $cart->count );
        $totalDiscount = $amount - ( $carts->sum( fn( $cart ) => $cart->productPrice->sale_price > 0 ? $cart->productPrice->sale_price * $cart->count : $cart->productPrice->price * $cart->count ) );
        $itemsCount = $carts->sum( fn( $cart ) => $cart->count );

        DB::beginTransaction();


        try {
            $order = ProductOrder::query()->create(
                [
                    'user_id'          => fUserId(),
                    'address_id'       => $validated->get( 'address_id' ),
                    'amount'           => ( $amount - $totalDiscount ) + $deliveryPrice,
                    'delivered_status' => ProductOrder::DELIVERED_STATUS_PREPARING,
                    'delivery_price'   => $deliveryPrice,
                    'payment_method'   => ProductOrder::PAYMENT_METHOD_CASH,
                    'item_count'       => $itemsCount,
                    'total_discount'   => $totalDiscount
                ]
            );
            foreach ( $carts as $cart ) {
                ProductOrderItem::query()->create(
                    [
                        'order_id'         => $order->id,
                        'product_id'       => $cart->product_id,
                        'product_price_id' => $cart->product_price_id,
                        'count'            => $cart->count
                    ]
                );
                $cart->update( [
                                   'status' => Cart::STATUS_COMPLETED
                               ] );
            }
        } catch ( \Exception $e ) {
            DB::rollBack();
            dd( $e->getMessage() );
        }
        DB::commit();
        return redirect()->route( 'orders.index' );
    }
}
