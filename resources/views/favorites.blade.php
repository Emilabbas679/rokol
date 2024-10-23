@extends('layout')
@section('title', translate('favorites'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Profile section -->
    <!-- Breadcrumb -->
    @include('partials.breadcrumbs')
    <!-- Breadcrumb -->


    <div class="section_wrap wrap_category wrap_profile_sect">
        <div class="main_center clearfix">
            <div class="sect_header clearfix">
                <h2 class="sect_title">Seçilmişlərim </h2>
            </div>
            <div class="sect_body clearfix">
                <div class="row">
                    @php
                        $locale = app()->getLocale()
                    @endphp
                    @foreach($favorites as $favorite)
                        @php
                            if(is_null($favorite->product)){
                                continue;
                            }
                            $product = $favorite->product
                        @endphp
                        <div class="col item_col clearfix">
                            <div class="col_in">
                                <div class="fav_sect">
                                    <!-- <div class="offer-tag">
                                            <p class="offer_val">Həftənin təklifi</p>
                                        </div> -->
                                    <!-- click after addclass "dofav" -->
                                    <span class="favotites dofav @if(!is_null($product->favorites?->where('price_id', $favorite->productPrice->id)->first())) dofav @endif"
                                          data-product-id="{!! $product->id !!}"
                                          data-price-id="{!! $favorite->productPrice->id !!}"></span>
                                </div>
                                <a href="{!! route('product', [$product, 'price_id' => $favorite->productPrice->id]) !!}">
                                    <div class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product">
                                    </div>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                        <span class="itm_name">
                                            {!! $product->name[$locale] !!}
                                        </span>
                                            <span class="itm_weight">
                                            @if($favorite->productPrice->weight)
                                                    <span class="itm_weight">{{$favorite->productPrice->weight->weight}} @if($favorite->productPrice->weight->weight_type == 0)
                                                            Q
                                                        @else
                                                            Kq
                                                        @endif</span>
                                                @endif
                                        </span>
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_price">
                                            @include('partials.product_price', ['price' => $favorite->productPrice])
                                        </div>
                                        <!-- stocked, unstocked -->
                                        <!-- <div class="itm_stock stocked">
                                           <span class="stock_text">Stokda: 25 ədəd</span>
                                        </div> -->
                                        <div class="itm_more">
                                            Səbətə əlavə et
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {!! $favorites->links() !!}
            </div>

        </div>
    </div>
    <!-- Product similar items -->

    <!-- Wrap Profile section -->

@endsection

@push('js')

    <script>
        $(document).ready(function () {
            $(".favotites").on('click', function (e) {
                let productId = $(this).data('productId');
                let priceId = $(this).data('priceId');
                let el = $(this);
                let route = '{!! route('favorites.store') !!}';
                let method = 'post';
                console.log(el.hasClass('dofav'))
                if (el.hasClass('dofav')) {
                    method = 'delete'
                    route = '{!! url('favorites') !!}/' + productId;
                }
                $.ajax({
                    url: route,
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: productId,
                        price_id: priceId
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status === 'success') {
                            let favoriteCountEl = $('.favorite_count');

                            if (favoriteCountEl.length) {
                                let count = favoriteCountEl[0].innerText;
                                if (!isNaN(parseFloat(count)) && isFinite(count)) {
                                    if (!el.hasClass('dofav')) {
                                        count = parseInt(count) + 1;
                                    } else {
                                        count = parseInt(count) - 1;
                                    }
                                }

                                if (count === 0) {
                                    $('.favorite_count').remove();
                                } else if(count > 99) {
                                    favoriteCountEl[0].innerText = '99+';
                                } else {
                                    favoriteCountEl[0].innerText = count;
                                }
                            } else {
                                $('.icon_fav').after(`<span class="favorite_count">1</span>`)
                            }
                            el.toggleClass("dofav");
                        }
                    },
                });
            });
        });
    </script>

@endpush
