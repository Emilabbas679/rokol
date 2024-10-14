@php
    $totalPrice = $products->sum(fn ($product) => $product->prices->first()->price * $cookieCarts->get($product->id)['count']);
    $discount = $totalPrice - ( $totalPriceWithDiscount = $products->sum(fn ($product) => ($price = $product->prices->first())->sale_price > 0 ? $price->sale_price * $cookieCarts->get($product->id)['count'] : $price->price * $cookieCarts->get($product->id)['count'] ) );
@endphp
        <!-- Mobile basket section -->
<div class="basket_mob_fix_back"></div>
<div class="basket_mob_fix">
    <div class="basket_mob_fix_content">
        <div class="basket_total_mob discount_price">
            <span class="bsk_itm_name">@lang('Cəmi')</span>
            <span class="bsk_itm_val total-price">{!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERY_PRICE !!} AZN</span>
        </div>
        <div class="basket_btn_mob">
            <button type="submit" class="filter_btn btn_send"
                    form="cart_form">@lang('Checkout')</button>
        </div>
    </div>
</div>

<div class="wrap_left">
    <div class="basket_items_sect">
        <div class="sect_header clearfix">
            <h2 class="sect_title">@lang('Səbət')</h2>
            <div class="basket_count_items">{!! $products->count() !!} @lang('məhsul')</div>
        </div>
        <div class="sect_body clearfix">
            @foreach($products as $product)
                @php
                $price = $product->prices->first();
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
                                <form action="{!! route('carts.session.delete', $product) !!}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete"></button>
                                </form>
                            </div>
                        </div>
                        <div class="bsk_row_list">
                            <span class="bck_itm_name">@lang('Color'):</span>
                            <span class="bck_itm_val">{{ $price->color->name[app()->getLocale()] }}</span>
                        </div>
                        <div class="bsk_row_list">
                            <span class="bck_itm_name">@lang('Weight'):</span>
                            <span
                                    class="bck_itm_val">{!! $price->weight->weight . " " . ($price->weight->weight_type == 1 ? 'Kq' : 'q') !!}
											</span>
                        </div>
                        <div class="bsk_row_list">
                            <div class="pr_slct_left">
                                <div class="filter_check_items">
                                    <div class="product_counter">
                                        <input type="hidden"
                                               form="cart_form"
                                               value="{!! $cookieCarts->get($product->id)['count'] !!}">
                                        <button type="button" class="pr_btn_counter pr_minus"
                                                data-cart-id="{!! $product->id !!}"></button>
                                        <div class="pr_number_sect">
                                            <span class="pr_number">{!! $cookieCarts->get($product->id)['count'] !!}</span>
                                        </div>
                                        <button type="button" class="pr_btn_counter pr_plus"
                                                data-cart-id="{!! $product->id !!}"></button>
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
														{!! $price->price !!} AZN
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
            <li>@lang('Sifariş təsdiqindən sonra məhsullar 3 iş günündə çatdırılacaq').</li>
            <li>@lang('Ünvanı yoxlayın, lazım olsa dəyişiklik edin').</li>
            <li>@lang('Sifariş statusunu e-poçt və ya SMS ilə izləyin').</li>
        </ul>
        <div class="basket_items_table">
            <form action="{!! route('carts.address') !!}" method="get" id="cart_form">
                <!-- Endirim varsa "discount_price",  cemi ise bu class "total_price"  -->
                <div class="bsk_itm_row">
                    <div class="bsk_itm_name">@lang('Qiymət'):</div>
                    <div class="bsk_itm_val total-price">
                        {!! $totalPrice !!}
                        AZN
                    </div>
                </div>
                <div class="bsk_itm_row discount_price">
                    <div class="bsk_itm_name">@lang('Endirim'):</div>
                    <div class="bsk_itm_val sale-price">
                        {!! $discount !!}
                        AZN
                    </div>
                </div>
                @if(\App\Models\ProductOrder::DELIVERY_PRICE > 0)
                    <div class="bsk_itm_row">
                        <div class="bsk_itm_name">@lang('Çatıdırılma'):</div>
                        <div class="bsk_itm_val">{!! \App\Models\ProductOrder::DELIVERY_PRICE !!}AZN
                        </div>
                    </div>
                @endif
                <div class="bsk_itm_row total_price">
                    <div class="bsk_itm_name">@lang('Ödəniləcək məbləğ'):</div>
                    <div class="bsk_itm_val total-basket">
                        {!! $totalPriceWithDiscount !!}
                        AZN
                    </div>
                </div>
                <button type="submit" class="filter_btn btn_send">@lang('Checkout')</button>
            </form>

        </div>
    </div>
</div>