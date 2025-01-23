@php
    $totalPrice = $carts->sum(fn ($cart) => $cart->productPrice->price * $cart->count);
    $discount = $totalPrice - ( $totalPriceWithDiscount = $carts->sum(fn ($cart) => $cart->productPrice->sale_price > 0 ? $cart->productPrice->sale_price * $cart->count : $cart->productPrice->price * $cart->count ) );
@endphp
        <!-- Mobile basket section -->
<div class="basket_mob_fix_back"></div>
<div class="basket_mob_fix">
    <div class="basket_mob_fix_content">
        <div class="basket_total_mob discount_price">
            <span class="bsk_itm_name">{{translate('total')}}</span>
            <span class="bsk_itm_val total-price">{!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERY_PRICE !!} AZN</span>
        </div>
        <div class="basket_btn_mob">
            <button type="submit" class="filter_btn btn_send"
                    form="cart_form" id="mobileCheck">{{translate('purchase')}}</button>
        </div>
    </div>
</div>

<div class="wrap_left">
    <div class="basket_items_sect">
        <div class="sect_header clearfix">
            <h2 class="sect_title">{{translate('basket')}}</h2>
            <div class="basket_count_items">{!! $carts->count() !!} {{translate('product')}}</div>
        </div>
        <div class="sect_body clearfix">
            @foreach($carts as $cart)
                @php
                    $product = $cart->product;
                @endphp
                <div class="basket_items">
                    <a href="{!! route('product', $product) !!}" class="item_img">
                        <img
                                src="{!! asset('storage/'.$product->image) !!}"
                                alt="product">
                    </a>
                    <div class="basket_item_content">
                        <div class="bsk_row_list">
                            <p class="itm_title"> {{ $product->name[app()->getLocale()] }} </p>
                            <div class="bsk_icons">
                                <span class="favotites "></span>
                                <form action="{!! route('carts.destroy', $cart) !!}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete"></button>
                                </form>
                            </div>
                        </div>
                        @if($cart->color)
                            <div class="bsk_row_list">
                                <span class="bck_itm_name">{{translate('color')}}:</span>
                                <span class="bck_itm_val">{{ $cart->color->name[app()->getLocale()] }}</span>
                            </div>
                        @endif
                        <div class="bsk_row_list">
                            <span class="bck_itm_name">{{translate('weights')}}:</span>
                            <span
                                    class="bck_itm_val">{!! $cart->productPrice->weight->weight . " " . productWeightUnit($cart->productPrice->weight->weight_type) !!}
											</span>
                        </div>
                        <div class="bsk_row_list">
                            <div class="pr_slct_left">
                                <div class="filter_check_items">
                                    <div class="product_counter">
                                        <input type="hidden" name="counters[{!! $cart->id !!}]"
                                               form="cart_form"
                                               value="{!! $cart->count !!}">
                                        <button type="button" class="pr_btn_counter pr_minus"
                                                data-cart-id="{!! $cart->id !!}"></button>
                                        <div class="pr_number_sect">
                                            <span class="pr_number">{!! $cart->count !!}</span>
                                        </div>
                                        <button type="button" class="pr_btn_counter pr_plus"
                                                data-cart-id="{!! $cart->id !!}"></button>
                                    </div>
                                </div>
                                <!-- stocked, unstocked -->
                                {{--                                                <div class="itm_stock stocked">--}}
                                {{--                                                    <span class="stock_text">Stokda: 25 ədəd</span>--}}
                                {{--                                                </div>--}}
                            </div>
                            <div class="itm_price">
                                @if($cart->productPrice->sale_price)
                                    <span class="old-main-price">
														{!! $cart->productPrice->price !!} AZN
													</span>
                                    <span class="old-price">

													</span>
                                    <span class="main-price">
														{!! $cart->productPrice->sale_price !!} AZN
													</span>
                                    <span class="new-price">

													</span>
                                @else
                                    <span class="main-price">
                                        @if($cart->productPrice->price > 0) {{ $cart->productPrice->price }} AZN @else *** @endif
													</span>
                                    <span class="new-price">

													</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</div>
<div class="wrap_right mobile_fix_item">
    <div class="basket_info_sect">
        <ul class="basket_info_list">
            <li>{{translate('basket_info_line_1')}}</li>
            <li>{{translate('basket_info_line_2')}}</li>
            <li>{{translate('basket_info_line_3')}}</li>
        </ul>
        <div class="basket_items_table">
            <form action="{!! route('carts.address') !!}" method="get" id="cart_form">
                <!-- Endirim varsa "discount_price",  cemi ise bu class "total_price"  -->
                <div class="bsk_itm_row">
                    <div class="bsk_itm_name">{{translate('price')}}:</div>
                    <div class="bsk_itm_val total-price">
                        {!! $totalPrice !!}
                        AZN
                    </div>
                </div>
                <div class="bsk_itm_row discount_price">
                    <div class="bsk_itm_name">{{translate('discount')}}:</div>
                    <div class="bsk_itm_val sale-price">
                        {!! $discount !!}
                        AZN
                    </div>
                </div>
                @if(\App\Models\ProductOrder::DELIVERY_PRICE > 0)
                    <div class="bsk_itm_row">
                        <div class="bsk_itm_name">{{translate('delivery')}}:</div>
                        <div class="bsk_itm_val">{!! \App\Models\ProductOrder::DELIVERY_PRICE !!}AZN
                        </div>
                    </div>
                @endif
                <div class="bsk_itm_row total_price">
                    <div class="bsk_itm_name">{{translate('paid')}}:</div>
                    <div class="bsk_itm_val total-basket">
                        {!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERY_PRICE !!}
                        AZN
                    </div>
                </div>
                <button type="submit" class="filter_btn btn_send">{{translate('purchase')}}</button>
            </form>

        </div>
    </div>
</div>
@push('js')
<script>
    $("#mobileCheck").click(function(){
        $("#cart_form").submit()
    })
</script>
@endpush