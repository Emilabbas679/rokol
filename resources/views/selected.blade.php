@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
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

                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <div class="offer-tag">
                                <p class="offer_val">Həftənin təklifi</p>
                            </div>
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">6.90 AZN</span>
                                <span class="old-price"></span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock unstocked">
                                <span class="stock_text">Stokda yoxdur </span>
                            </div>
                            <div class="itm_more disabled">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <div class="offer-tag">
                                <p class="offer_val">Həftənin təklifi</p>
                            </div>
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">6.90 AZN</span>
                                <span class="old-price"></span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock unstocked">
                                <span class="stock_text">Stokda yoxdur </span>
                            </div>
                            <div class="itm_more disabled">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <div class="offer-tag">
                                <p class="offer_val">Həftənin təklifi</p>
                            </div>
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">6.90 AZN</span>
                                <span class="old-price"></span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock unstocked">
                                <span class="stock_text">Stokda yoxdur </span>
                            </div>
                            <div class="itm_more disabled">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col item_col clearfix">
                    <div class="col_in">
                        <div class="fav_sect">
                            <!-- <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div> -->
                            <!-- click after addclass "dofav" -->
                            <span class="favotites "></span>
                        </div>
                        <a href="#" class="item_img">
                            <img src="{{asset('img/item.png')}}" alt="product" >
                        </a>
                        <div class="item_content">
                            <h4 class="itm_title">
                                <span class="itm_name">
                                    Rokol
                                </span>
                                <span class="itm_weight">
                                    2.5 kq
                                </span>
                            </h4>
                            <div class="itm_info">
                                Sellülozik Boya
                            </div>
                            <div class="itm_price">
                                <span class="new-price">4.50 AZN</span>
                                <span class="old-price">5.00 AZN</span>
                            </div>
                            <!-- stocked, unstocked -->
                            <div class="itm_stock stocked">
                                <span class="stock_text">Stokda: 25 ədəd</span>
                            </div>
                            <div class="itm_more">
                                Səbətə əlavə et
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- Product similar items -->

<!-- Wrap Profile section -->

@endsection

@push('js')

<script>
$(document).ready(function() {
    $(".favotites").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dofav");
    });
});
</script>

@endpush
