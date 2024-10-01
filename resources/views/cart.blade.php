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
                @if(!$carts->count())
                <div class="empty_basket_section clearfix">
                    <div class="empty_bs_icon"></div>
                    <div class="empty_bs_title">Səbətinizdə məhsul yoxdur!</div>
                    <div class="empty_bs_button">
                        <a href="/" class="filter_btn btn_send">Alış-verişə davam et</a>
                    </div>
                </div>
                <!-- Empty basket sect -->
                @else
                @php
                     $totalPrice = $carts->sum(fn ($cart) => $cart->productPrice->price * $cart->count);
                     $discount = $totalPrice - ( $totalPriceWithDiscount = $carts->sum(fn ($cart) => $cart->productPrice->sale_price > 0 ? $cart->productPrice->sale_price * $cart->count : $cart->productPrice->price * $cart->count ) );
                @endphp
                <!-- Mobile basket section -->
                <div class="basket_mob_fix_back"></div>
                <div class="basket_mob_fix">
                    <div class="basket_mob_fix_content">
                        <div class="basket_total_mob discount_price">
                            <span class="bsk_itm_name">@lang('Cəmi')</span>
                            <span class="bsk_itm_val total-price">{!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERU_PRICE !!} AZN</span>
                        </div>
                        <div class="basket_btn_mob">
                            <button type="submit" class="filter_btn btn_send" form="cart_form">@lang('Checkout')</button>
                        </div>
                    </div>
                </div>

                <div class="wrap_left">
                    <div class="basket_items_sect">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">@lang('Səbət')</h2>
                            <div class="basket_count_items">{!! $carts->count() !!} @lang('məhsul')</div>
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
                                        <div class="bsk_row_list">
                                            <span class="bck_itm_name">@lang('Color'):</span>
                                            <span class="bck_itm_val">{!! $cart->productPrice->color->name[app()->getLocale()] !!}</span>
                                        </div>
                                        <div class="bsk_row_list">
                                            <span class="bck_itm_name">@lang('Weight'):</span>
                                            <span
                                                class="bck_itm_val">{!! $cart->productPrice->weight->weight . " " . ($cart->productPrice->weight->weight_type == 1 ? 'Kq' : 'q') !!}
											</span>
                                        </div>
                                        <div class="bsk_row_list">
                                            <div class="pr_slct_left">
                                                <div class="filter_check_items">
                                                    <div class="product_counter">
                                                        <input type="hidden" name="counter"
                                                               value="{!! $cart->count !!}">
                                                        <button type="button" class="pr_btn_counter pr_minus"></button>
                                                        <div class="pr_number_sect">
                                                            <span class="pr_number">{!! $cart->count !!}</span>
                                                        </div>
                                                        <button type="button" class="pr_btn_counter pr_plus"></button>
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
														{!! $cart->productPrice->price !!} AZN
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
								<div class="bsk_itm_row">
									<div class="bsk_itm_name">@lang('Çatıdırılma'):</div>
									<div class="bsk_itm_val">{!! \App\Models\ProductOrder::DELIVERU_PRICE !!} AZN</div>
								</div>
								<div class="bsk_itm_row total_price">
									<div class="bsk_itm_name">@lang('Ödəniləcək məbləğ'):</div>
									<div class="bsk_itm_val total-basket">
                                        {!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERU_PRICE !!} AZN
									</div>
								</div>
								<button type="submit" class="filter_btn btn_send">@lang('Checkout')</button>
							</form>

						</div>
					</div>
				</div>
                @endif
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
                $(this).toggleClass("dodel");
            });
        });
	</script>
	<script>
        function updatePrices(countClass, priceClass, targetClass) {
            $('.basket_item_content').each(function() {
                const count = parseInt($(this).find(countClass).text(), 10);
                const priceText = $(this).find(priceClass).text().replace(' AZN', '').trim();
                const price = parseFloat(priceText);
                const productTotal = count * price;
                $(this).find(targetClass).text(productTotal.toFixed(2) + ' AZN');
            });
        }
        function calculateGrandTotal() {
            let total = 0;

            $('.basket_item_content').each(function() {
                const count = parseInt($(this).find('.pr_number').text(), 10);
                const oldPriceElement = $(this).find('.old-main-price');
                const priceElement = $(this).find('.main-price');
                
                // Eğer 'old-main-price' varsa, onun değerini al, yoksa 'main-price' değerini al
                const price = oldPriceElement.length ? parseFloat(oldPriceElement.text()) : parseFloat(priceElement.text());
                
                total += count * price;
            });

            $('.total-price').text(total.toFixed(2) + ' AZN');
            return total;
        }
        function saleCalculateGrandTotal() {
            let saleTotal = 0;

            $('.basket_item_content').each(function() {
                const count = parseInt($(this).find('.pr_number').text(), 10);
                const priceElement = $(this).find('.main-price');
                
                const price = parseFloat(priceElement.text());
                
                saleTotal += count * price;
            });
            return saleTotal;
            
        }
        function calculateDifference() {
            const total = calculateGrandTotal();
            const saleTotal = saleCalculateGrandTotal();

            const difference = total - saleTotal;
            
            $('.sale-price').text(difference.toFixed(2) + ' AZN');
        }
        calculateGrandTotal();
        saleCalculateGrandTotal();
        calculateDifference()
        $('.total-basket').text(saleCalculateGrandTotal() + 5 + ' AZN');
        updatePrices('.pr_number', '.old-main-price', '.old-price');
        updatePrices('.pr_number', '.main-price', '.new-price');
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
                updatePrices('.pr_number', '.old-main-price', '.old-price');
                updatePrices('.pr_number', '.main-price', '.new-price');
                calculateGrandTotal();
                saleCalculateGrandTotal();
                calculateDifference()
                $('.total-basket').text(saleCalculateGrandTotal() + 5 + ' AZN');
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
                updatePrices('.pr_number', '.old-main-price', '.old-price');
                updatePrices('.pr_number', '.main-price', '.new-price');
                calculateGrandTotal();
                saleCalculateGrandTotal();
                calculateDifference()
                $('.total-basket').text(saleCalculateGrandTotal() + 5 + ' AZN');
            });

            
            
        });



	</script>
@endpush
