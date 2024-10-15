<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddProductRequest;
use App\Http\Requests\CartCompleteRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\ProductOrderItem;
use App\Models\ProductPrice;
use App\Rules\ArrayKeysExists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends
    Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( is_null( fUser() ) ) {

            $cookieCarts = \request()->cookie( 'carts' );
            if ( !$cookieCarts ) {
                return view( 'cart' );
            }
            if ( is_string( $cookieCarts ) ) {
                $cookieCarts = collect( json_decode( $cookieCarts, true ) );
            }

            $ids      = $cookieCarts->keys();
            $products = Product::query()
                               ->with( [
                                           'prices' => fn( $query ) => $query->whereIn( 'id', $cookieCarts->pluck( 'product_price_id' ) ),
                                       ] )
                               ->whereIn( 'id', $ids->toArray() )->get();
            $compact  = compact( 'products', 'cookieCarts' );
        }
        else {
            $carts   = Cart::query()
                           ->with( [
                                       'product',
                                       'productPrice.color',
                                       'productPrice.weight'
                                   ] )
                           ->where( 'user_id', auth()->id() )
                           ->where( 'status', Cart::STATUS_UNCOMPLETED )
                           ->get();
            $compact = compact( 'carts' );
        }


        return view( 'cart', $compact );
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
        $validated      = collect( $request->validated() );
        $productId      = $validated->get( 'product_id' );
        $productPriceId = ProductPrice::query()
                                      ->select( 'id' )
                                      ->where( 'product_id', $productId )
                                      ->where( 'color_id', $validated->get( 'color_id' ) )
                                      ->where( 'weight_id', $validated->get( 'weight_id' ) )
                                      ->first()->id;

        if ( is_null( fUser() ) ) {
            $carts = $request->cookie( 'carts', collect() );
            if ( is_string( $carts ) ) {
                $carts = collect( json_decode( $carts, true ) );
            }
            $cartsProduct                     = $carts->get( $productId, [] );
            $cartsProduct['product_price_id'] = $productPriceId;
            $cartsProduct['count']            = (int) ( $cartsProduct['count'] ?? 0 ) + $validated->get( 'count' );
            $carts->put( $productId, $cartsProduct );

            $cookie = cookie( 'carts', $carts );
            return response()->json( [
                                         'status'            => 'success',
                                         'totalProductCount' => $carts->count()
                                     ] )->cookie( $cookie );
        }

        Cart::query()->updateOrCreate( [
                                           'user_id'          => fUserId(),
                                           'product_id'       => $productId,
                                           'product_price_id' => $productPriceId,
                                           'status'           => Cart::STATUS_UNCOMPLETED
                                       ],
                                       [
                                           'count' => DB::raw( 'count + ' . $validated->get( 'count' ) ),
                                       ] );
//        DB::enableQueryLog();
        $carts = Cart::query()
            ->select( DB::raw( 'count(id) as cart_product_count' ) )
            ->where( 'status', Cart::STATUS_UNCOMPLETED )
            ->where( 'user_id', fUserId() )
            ->groupBy( [ 'product_id' ] )
            ->get();
//        dd( $cartttt->sum('cart_product_count') );
//        dd( DB::getQueryLog() );
        return response()->json( [
                                     'status'            => 'success',
                                     'totalProductCount' => $carts->sum( 'cart_product_count' )
                                 ] );
    }

    public function selectAddress()
    {
        if ( !\request()->filled( 'counters' ) || !is_array( \request()->input( 'counters' ) ) ) {
            return redirect()->route( 'carts.index' );
        }
        $validated = Validator::make( \request()->all(), [
            'counters'   => [ 'required', 'array', new ArrayKeysExists( \request()->input( 'counters' ) ) ],
            'counters.*' => [ 'required', 'numeric', 'min:1', 'max:15' ],
        ] )->validated();
        DB::beginTransaction();
        try {
            $this->updateCountsAllCartElements( $validated['counters'] );
        } catch ( \Exception $e ) {
            return redirect()->back()->withInput( $validated );
        }
        DB::commit();
        $addresses = Address::query()
                            ->where( 'user_id', fUserId() )
                            ->get();
        $carts     = Cart::query()
                         ->with( [
                                     'product',
                                     'productPrice.color',
                                     'productPrice.weight'
                                 ] )
                         ->where( 'user_id', auth()->id() )
                         ->where( 'status', Cart::STATUS_UNCOMPLETED )
                         ->get();

        if ( !$carts->count() ) {
            return redirect()->route( 'products' );
        }

        return view( 'checkout_address', compact( 'addresses', 'carts' ) );
    }

    public function completeCart( CartCompleteRequest $request )
    {
        $validated     = collect( $request->validated() );
        $deliveryPrice = $validated->has( 'select_address' ) && $validated->get( 'select_address' ) === 'address'
            ? ProductOrder::DELIVERY_PRICE
            : 0;
        $carts         = Cart::query()
                             ->with( [
                                         'product',
                                         'productPrice.color',
                                         'productPrice.weight'
                                     ] )
                             ->where( 'user_id', auth()->id() )
                             ->where( 'status', Cart::STATUS_UNCOMPLETED )
                             ->get();
        $amount        = $carts->sum( fn( $cart ) => $cart->productPrice->price * $cart->count );
        $totalDiscount = $amount - ( $carts->sum( fn( $cart ) => $cart->productPrice->sale_price > 0
                ? $cart->productPrice->sale_price * $cart->count
                : $cart->productPrice->price * $cart->count ) );
        $itemsCount    = $carts->sum( fn( $cart ) => $cart->count );

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

    private function updateCountsAllCartElements( array $counters ): void
    {
        foreach ( $counters as $key => $value ) {

            Cart::query()->where( 'id', $key )
                ->where( 'status', Cart::STATUS_UNCOMPLETED )
                ->update( [
                              'count' => $value
                          ] );
        }
    }

    public function deleteFromSessionByProductId( int $productId )
    {
        $cookieCarts = \request()->cookie( 'carts' );
        if ( is_string( $cookieCarts ) ) {
            $cookieCarts = collect( json_decode( $cookieCarts, true ) );
        }

        $cookieCarts->forget( $productId );
        $cookie = cookie( 'carts', $cookieCarts );
        return redirect()->back()->cookie( $cookie );

    }
}
