@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Sign section -->
    <div class="section_wrap wrap_basket_page">
        <div class="main_center">


            <div class="sect_body clearfix">
                <div class="wrap_left">
                    <div class="basket_items_sect">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">Səbət </h2>
                            <div class="basket_count_items">3 məhsul</div>
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
                                                <span class="delete "></span>
                                            </div>
                                        </div>
                                        <div class="bsk_row_list">
                                            <span class="bck_itm_name">@lang('Color'):</span>
                                            <span class="bck_itm_val">{!! $cart->productPrice->color->name[app()->getLocale()]
 !!}</span>
                                        </div>
                                        <div class="bsk_row_list">
                                            <span class="bck_itm_name">@lang('Weight'):</span>
                                            <span class="bck_itm_val">{!! $cart->productPrice->weight->weight . " " . $cart->productPrice->weight->weight_type !!} kq</span>
                                        </div>
                                        <div class="bsk_row_list">
                                            <div class="pr_slct_left">
                                                <div class="filter_check_items">
                                                    <div class="product_counter">
                                                        <input type="hidden" name="counter" value="{!! $cart->count !!}">
                                                        <button type="button" class="pr_btn_counter pr_minus"></button>
                                                        <div class="pr_number_sect">
                                                            <span class="pr_number">{!! $cart->count !!}</span>
                                                        </div>
                                                        <button type="button" class="pr_btn_counter pr_plus"></button>
                                                    </div>
                                                </div>
                                                <!-- stocked, unstocked -->
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>
                                            <div class="itm_price">
                                                <span class="old-price">5.00 AZN</span>
                                                <span class="new-price">6.00 AZN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
                <div class="wrap_right">
                    <div class="basket_info_sect">
                        <ul class="basket_info_list">
                            <li>Sifariş təsdiqindən sonra məhsullar 3 iş günündə çatdırılacaq.</li>
                            <li>Ünvanı yoxlayın, lazım olsa dəyişiklik edin.</li>
                            <li>Sifariş statusunu e-poçt və ya SMS ilə izləyin.</li>
                        </ul>
                        <div class="basket_items_table">
                            <form action="#" method="post">
                                <!-- Endirim varsa "discount_price",  cemi ise bu class "total_price"  -->
                                <div class="bsk_itm_row">
                                    <div class="bsk_itm_name">Qiymət:</div>
                                    <div class="bsk_itm_val">585 AZN</div>
                                </div>
                                <div class="bsk_itm_row discount_price">
                                    <div class="bsk_itm_name">Endirim:</div>
                                    <div class="bsk_itm_val">-18 AZN</div>
                                </div>
                                <div class="bsk_itm_row">
                                    <div class="bsk_itm_name">Çatıdırılma:</div>
                                    <div class="bsk_itm_val">5 AZN</div>
                                </div>
                                <div class="bsk_itm_row total_price">
                                    <div class="bsk_itm_name">Ödəniləcək məbləğ:</div>
                                    <div class="bsk_itm_val">550 AZN</div>
                                </div>
                                <button type="submit" class="filter_btn btn_send">Checkout</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Wrap Sign section -->

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(".favotites").click(function (e) {
                e.preventDefault();
                e.stopPropagation()
                $(this).toggleClass("dofav");
            });
            $(".delete").click(function (e) {
                e.preventDefault();
                e.stopPropagation()
                $(this).toggleClass("dodel");
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            var maxCount = 15;
            var minCount = 0;

            $('.pr_plus').click(function () {
                var $counterSection = $(this).closest('.product_counter');
                var $input = $counterSection.find('input[name="counter"]');
                var $numberSpan = $counterSection.find('.pr_number');

                var currentCount = parseInt($input.val());

                if (currentCount < maxCount) {
                    currentCount++;
                    $input.val(currentCount);
                    $numberSpan.text(currentCount);
                }
            });

            $('.pr_minus').click(function () {
                var $counterSection = $(this).closest('.product_counter');
                var $input = $counterSection.find('input[name="counter"]');
                var $numberSpan = $counterSection.find('.pr_number');

                var currentCount = parseInt($input.val());

                if (currentCount > minCount) {
                    currentCount--;
                    $input.val(currentCount);
                    $numberSpan.text(currentCount);
                }
            });

        });
    </script>
@endpush
