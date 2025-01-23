@php
    $totalPrice = $products->sum(fn ($product) => ($product->prices->first()?->price ?? 0) * 0);
    $discount = $totalPrice - ( $totalPriceWithDiscount = $products->sum(fn ($product) => ($price = $product->prices->first())?->sale_price > 0 ? $price->sale_price * 0 : $price?->price * 0 ) );
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
                    form="cart_form">{{translate('purchase')}}</button>
        </div>
    </div>
</div>

<div class="wrap_left">
    <div class="basket_items_sect">
        <div class="sect_header clearfix">
            <h2 class="sect_title">{{translate('basket')}}</h2>
            <div class="basket_count_items">{!! $products->count() !!} {{translate('product')}}</div>
        </div>
        <div class="sect_body clearfix">
            @for($i = 0; $i < $products->count(); $i++)
                @php
                    $cookies = collect($cookieCarts->get($products[$i]->id));
                    $cookieColors = array_column($cookies->toArray(), 'color_id');
                @endphp
                @for($j = 0; $j < count($cookieColors); $j++)
                    @php
                        $col = $cookieColors[$j];
                        $cookie = $cookies->get($j);
                        $price = $products[$i]->prices->where('id', $cookie['product_price_id'])->first();
                    @endphp
                    <div class="basket_items">
                        <a href="{!! route('product', $products[$i]) !!}" class="item_img">
                            <img
                                    src="{!! asset('storage/'.$products[$i]->image) !!}"
                                    alt="product">
                        </a>
                        <div class="basket_item_content">
                            <div class="bsk_row_list">
                                <p class="itm_title"> {{ $products[$i]->name[app()->getLocale()] }} </p>
                                <div class="bsk_icons">
                                    <span class="favotites "></span>
                                    <form action="{!! route('carts.session.delete', $products[$i]) !!}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete"></button>
                                    </form>
                                </div>
                            </div>
                            @if(!is_null($col) && !is_null($color = $colors->where('id', (int) $col)->first()))
                                <div class="bsk_row_list">
                                    <span class="bck_itm_name">{{translate('color')}}:</span>
                                    <span class="bck_itm_val">{{ $color->name[app()->getLocale()] }}</span>
                                </div>
                            @endif
                            <div class="bsk_row_list">
                                <span class="bck_itm_name">{{translate('weights')}}:</span>
                                <span
                                        class="bck_itm_val">{!! $price->weight->weight . " " . productWeightUnit($price->weight->weight_type) !!}
											</span>
                            </div>
                            <div class="bsk_row_list">
                                <div class="pr_slct_left">
                                    <div class="filter_check_items">
                                        <div class="product_counter">
                                            <input type="hidden" name="counters[{!! $products[$i]->id !!}]"
                                                   form="cart_form"
                                                   value="{!! $cookie['count'] !!}">
                                            <button type="button" class="pr_btn_counter pr_minus"
                                                    data-cart-id="{!! $products[$i]->id !!}"></button>
                                            <div class="pr_number_sect">
                                                <span class="pr_number">{!! $cookie['count'] !!}</span>
                                            </div>
                                            <button type="button" class="pr_btn_counter pr_plus"
                                                    data-cart-id="{!! $products[$i]->id !!}"></button>
                                        </div>
                                    </div>
                                    <!-- stocked, unstocked -->
                                    {{--                                                <div class="itm_stock stocked">--}}
                                    {{--                                                    <span class="stock_text">Stokda: 25 ədəd</span>--}}
                                    {{--                                                </div>--}}
                                </div>
                                <div class="itm_price">
                                    @if($price->sale_price)
                                        <span class="old-main-price">
														{!! $price->price !!} AZN
													</span>
                                        <span class="old-price">

													</span>
                                        <span class="main-price">
														{!! $price->sale_price !!} AZN
													</span>
                                        <span class="new-price">

													</span>
                                    @else
                                        <span class="main-price">
                                          @if($price->price > 0)
                                                {{ $price->price }} AZN
                                            @else
                                                ***
                                            @endif
													</span>
                                        <span class="new-price">

													</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endfor
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
                        {!! $totalPriceWithDiscount !!}
                        AZN
                    </div>
                </div>
                <button type="submit" class="filter_btn btn_send">{{translate('purchase')}}</button>
            </form>
        </div>
    </div>
</div>