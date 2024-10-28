@extends('layout')
@section('title', translate('cart'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Sign section -->
    <div class="section_wrap wrap_basket_page">
        <div class="main_center">

            @if($errors->any() && app()->environment('local'))
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            <div class="sect_body clearfix">
                @if((!isset($carts) || !$carts->count()) && (!isset($products) || !$products->count()))
                    <div class="empty_basket_section clearfix">
                        <div class="empty_bs_icon"></div>
                        <div class="empty_bs_title">Səbətinizdə məhsul yoxdur!</div>
                        <div class="empty_bs_button">
                            <a href="/" class="filter_btn btn_send">Alış-verişə davam et</a>
                        </div>
                    </div>
                    <!-- Empty basket sect -->
                @else

                    @if(isset($carts))
                        @include('partials.cart_login', ['carts' => $carts])
                    @elseif(isset($products))
                        @include('partials.cart_not_login', ['products' => $products, 'cookieCarts' => $cookieCarts])
                    @endif
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
    $('.basket_item_content').each(function () {
        const count = parseInt($(this).find(countClass).text(), 10);
        const priceText = $(this).find(priceClass).text().replace(' AZN', '').trim();

        // Eğer priceText '***' ise targetClass alanına '***' yaz, değilse productTotal değerini yaz
        const productTotal = priceText === '***' ? '***' : (count * parseFloat(priceText)).toFixed(2) + ' AZN';
        $(this).find(targetClass).text(productTotal);
    });
}

function calculateGrandTotal() {
    let total = 0;

    $('.basket_item_content').each(function () {
        const count = parseInt($(this).find('.pr_number').text(), 10);
        const oldPriceElement = $(this).find('.old-main-price');
        const priceElement = $(this).find('.main-price');

        const priceText = oldPriceElement.length ? oldPriceElement.text() : priceElement.text();
        const price = priceText === '***' ? 0 : parseFloat(priceText) || 0;

        total += count * price;
    });

    $('.total-price').text(total.toFixed(2) + ' AZN');
    return total;
}

function saleCalculateGrandTotal() {
    let saleTotal = 0;

    $('.basket_item_content').each(function () {
        const count = parseInt($(this).find('.pr_number').text(), 10);
        const priceElement = $(this).find('.main-price');

        const priceText = priceElement.text();
        const price = priceText === '***' ? 0 : parseFloat(priceText) || 0;

        saleTotal += count * price;
    });

    return saleTotal.toFixed(2);
}

function calculateDifference() {
    const total = calculateGrandTotal();
    const saleTotal = parseFloat(saleCalculateGrandTotal()) || 0;
    const difference = total - saleTotal;

    $('.sale-price').text(difference.toFixed(2) + ' AZN');
}

// Kodu çalıştırma işlemi
calculateGrandTotal();
saleCalculateGrandTotal();
calculateDifference();
$('.total-basket').text((parseFloat(saleCalculateGrandTotal()) + {!! \App\Models\ProductOrder::DELIVERY_PRICE !!} || 0).toFixed(2) + ' AZN');
updatePrices('.pr_number', '.old-main-price', '.old-price');
updatePrices('.pr_number', '.main-price', '.new-price');

$(document).ready(function () {
    var maxCount = 15;
    var minCount = 1;

    $('.pr_plus').click(function () {
        var cartId = $(this).data('cartId');
        var $counterSection = $(this).closest('.product_counter');
        var $input = $counterSection.find(`input[name="counters[${cartId}]"]`);
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
        calculateDifference();
        $('.total-basket').text((parseFloat(saleCalculateGrandTotal()) + {!! \App\Models\ProductOrder::DELIVERY_PRICE !!} || 0).toFixed(2) + ' AZN');
    });

    $('.pr_minus').click(function () {
        var cartId = $(this).data('cartId');
        var $counterSection = $(this).closest('.product_counter');
        var $input = $counterSection.find(`input[name="counters[${cartId}]"]`);
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
        calculateDifference();
        $('.total-basket').text((parseFloat(saleCalculateGrandTotal()) + {!! \App\Models\ProductOrder::DELIVERY_PRICE !!} || 0).toFixed(2) + ' AZN');
    });
});



    </script>
@endpush
