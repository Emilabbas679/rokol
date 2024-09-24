@extends('layout')
@section('title', $product->name)
@push('meta')

@endpush

@push('css')

@endpush

@section('content')
<div class="section_wrap wrap_product">
    <div class="main_center clearfix">
        <!-- Product detail section -->
        <div class="section_wrap wrap_breadcrumb">
            <div class="breadcrumb">
                <a href="{{route('home')}}">Əsas səhifə</a>
                <a href="{{route('category', $product->category_id)}}">Məhsullar</a>
                <a href="javascript:void(0)">{{$product->name}}</a>
            </div>
            <!-- <div class="pr_like_button">
                <span class="favotites "></span>
                <a href="#" class="share_product"></a>
            </div> -->


        </div>

        <!-- Product detail section -->
        <div class="section_wrap wrap_category wrap_detail_product">
            <div class="sect_body product_container clearfix">
                <div class="wrap_left">
                    <div class="col_in">
                        <div class="fav_sect">
                            <div class="offer-tag">
                                <p class="offer_val">Həftənin təklifi</p>
                            </div>
                        </div>
                        <div class="item_img">
                            <img src="{{asset('storage/'.$product->image)}}" alt="product" >
                        </div>
                    </div>
                </div>
                <div class="wrap_right">
                    <div class="product_detail">
                        <div class="product_content_sect">
                            <div class="product_info_table">

                                <div class="pr_tbl_left">
                                    <h1 class="product_title">Sellülozik Boya</h1>
                                    <p class="pr_short_info">Məhsulun kodu: {{$product->code}}</p>

                                    <div class="price_section">
                                        <div class="pr_price_info">
                                            <div class="itm_price" id="item_price">

                                                @include('partials.product_price')



                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr_row">
                                        <div class="pr_cat_name">{{translate('product_category')}}:</div>
                                        <div class="pr_cat_info">{{$product->category->name[app()->getLocale()] ?? ''}}</div>
                                    </div>
                                    @if(count($product->types) > 0)
                                        <div class="pr_row">
                                            <div class="pr_cat_name">{{translate('product_type')}}:</div>
                                            @php $types = []; @endphp
                                            @foreach ($product->types as $type)
                                            @php $types[] = $type->name[app()->getLocale()] ?? '' @endphp
                                            @endforeach
                                            <div class="pr_cat_info">{{implode(', ', $types)}}</div>
                                        </div>
                                    @endif

                                    @if(count($product->appearances) > 0)
                                    <div class="pr_row">
                                        <div class="pr_cat_name">{{translate('product_appearance')}}:</div>
                                        @php $appearances = []; @endphp
                                        @foreach ($product->appearances as $item)
                                            @php $appearances[] = $item->name[app()->getLocale()] ?? '' @endphp
                                        @endforeach
                                        <div class="pr_cat_info">{{implode(', ', $appearances)}}</div>
                                    </div>
                                    @endif


                                    @if(count($product->refProperties) > 0)
                                    <div class="pr_row">
                                        <div class="pr_cat_name">{{translate('product_properties')}}:</div>
                                        @php $properties = []; @endphp
                                        @foreach ($product->refProperties as $item)
                                            @php $properties[] = $item->name[app()->getLocale()] ?? '' @endphp
                                        @endforeach
                                        <div class="pr_cat_info">{{implode(', ', $properties)}}</div>
                                    </div>
                                    @endif

                                    @if(count($product->applicationAreas) > 0)
                                    <div class="pr_row">
                                        <div class="pr_cat_name">{{translate('product_application_areas')}}:</div>
                                        @php $applicationAreas= []; @endphp
                                        @foreach ($product->applicationAreas as $item)
                                            @php $applicationAreas[] = $item->name[app()->getLocale()] ?? '' @endphp
                                        @endforeach
                                        <div class="pr_cat_info">{{implode(', ', $applicationAreas)}}</div>
                                    </div>
                                    @endif

                                    <div id="color_weights">
                                        @include('partials.product_color_weights')
                                    </div>


                                </div>
                                <div class="pr_tbl_right">
                                    <div class="pr_main_buttons">
                                        <a href="#" target="_blank" class="pr_buttons">
                                            <img src="{{asset('img/icons/pr_calc.svg?v1')}}" alt="calculator">
                                        </a>
                                        <a href="#" target="_blank" class="pr_buttons">
                                            <img src="{{asset('img/icons/pr_tpdf.svg?v1')}}" alt="pdf">
                                        </a>
                                        <a href="#" target="_blank" class="pr_buttons">
                                            <img src="{{asset('img/icons/pr_mpdf.svg?v1')}}" alt="pdf">
                                        </a>
                                        <a href="#" target="_blank" class="pr_buttons">
                                            <img src="{{asset('img/icons/pr_video.svg?v1')}}" alt="video">
                                        </a>
                                        <a href="#" target="_blank" class="pr_buttons">
                                            <img src="{{asset('img/icons/pr_print.svg?v1')}}" alt="print">
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="product_select_proporties">

                                <div class="pr_stock_info">
{{--                                    <div class="itm_stock stocked">--}}
{{--                                        <span class="stock_text">Stokda: 25 ədəd </span>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="pr_row add_backet_sect">
                                    <div class="pr_slct_left">
                                        <div class="filter_check_items">
                                            <div class="product_counter">
                                                <input type="hidden" name="counter" value="0">
                                                <button type="button" class="pr_btn_counter pr_minus"></button>
                                                <div class="pr_number_sect"><span class="pr_number">0</span></div>
                                                <button type="button" class="pr_btn_counter pr_plus"></button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="btn_detail btn_basket">
                                        <span>
                                            Səbətə əlavə et
                                        </span>
                                    </div>
                                    <!-- click after addclass "dofav" -->
                                    <div class="btn_detail btn_fav">
                                        <span>
                                            Seçilmişlərdə saxla
                                        </span>
                                    </div>

                                </div>
                                <div class="share_section">
                                    <span class="sh_name">Paylaş:</span>
                                    <ul>
                                        <li>
                                            <a href=""><img src="{{asset('img/icons/s_fb.svg')}}" alt="fb"></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('img/icons/s_twt.svg')}}" alt="twt"></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('img/icons/s_msg.svg')}}" alt="msg"></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('img/icons/s_wp.svg')}}" alt="wp"></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Product detail section -->

            <!-- Product tab content -->
            <div class="section_wrap wrap_tab_product">
                <div class="sect_body clearfix">

                    <div class="benefit_tabs">
                        <div class="bf_tb_hd">
                            <div class="bt_tb_title clicked_tab_btn active" data-id="0">Məhsul haqqında </div>
                            <div class="bt_tb_title clicked_tab_btn" data-id="1">Texniki göstəricilər</div>
                            <div class="bt_tb_title clicked_tab_btn" data-id="2">Zəmanət</div>
                        </div>
                        <div class="bf_tb_content">
                            <div class="bf_tb_items " data-id="0">
                                <div class="indicators_content">
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Məhsul haqqında:</h6>
                                        <div>{!! $product->about !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">İstifadə Sahələri:</h6>
                                        <div>{!! $product->usage !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">İstifadə Qaydaları:</h6>
                                        <div>{!! $product->usage_rules !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Üstünlükləri :</h6>
                                        <div>{!! $product->advantage !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Tətbiqi :</h6>
                                        <div>{!! $product->apply !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bf_tb_items " data-id="1">
                                <div class="indicators_content">
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">{{translate('product_properties')}}:</h6>
                                        <div>{!! $product->properties !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">{{translate('product_consumption')}}:</h6>
                                        <div>{!! $product->consumption !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bf_tb_items " data-id="2">
                                <div class="indicators_content">
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Saxlama müddəti:</h6>
                                        <div>{!! $product->retention !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Xəbərdarlıqlar:</h6>
                                        <div>{!! $product->warning !!}</div>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Zəmanət:</h6>
                                        <div>{!! $product->guarantee !!}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product tab content -->

            <!-- Product similar items -->
            <div class="section_wrap wrap_category wrap_similar_product">
                <div class="sect_header clearfix">
                    <h2 class="sect_title">
                        <a href="">Oxşar məhsullar</a>
                    </h2>
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
            <!-- Product similar items -->


        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $('select').on('select2:open', function() {
        var placeholderItem = $(this).data("placeholder");
        $('.select2-search--dropdown .select2-search__field').attr('placeholder', `${placeholderItem}`);
    });
    $('#products_main').select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.customDrop-main')
    });
    $('#products_other').select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.customDrop-other')
    });
});
</script>
<script>
$(document).ready(function() {
    $('.radio_btn input[type="checkbox"]').click(function() {
        if ($(this).prop('checked')) {
            $('.radio_btn input[type="checkbox"]').not(this).prop('checked', false);
        }
    });
});
</script>

<script>
$(document).ready(function() {

    var maxCount = 15;
    var minCount = 0;

    $('.pr_plus').click(function() {
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

    $('.pr_minus').click(function() {
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


<script>
$(document).ready(function() {
    // *Favorites 
    $(".favotites").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dofav");
    });
    // *Favorites
    // *Favorites 
    $(".btn_fav").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dofav");
    });
    // *Favorites

});


var color_id = 0;
var weight_id = 0;


$("body").on("change", "input[name='color']", function () {
    color_id = $(this).val();
    priceAjax()
})

// $("body").on("change", "input[name='weight']", function () {
//     weight_id = $(this).val();
//     priceAjax()
// })

function priceAjax()
{
    $.ajax({
        type: "POST",
        url: "{{route('product_price', $product->id)}}",
        data: {
            color_id: color_id,
            // weight_id: weight_id,
            "_token": "{{ csrf_token() }}",
        },
        success: function (result) {
            $("#color_weights").html(result.html)
            $("#item_price").html(result.price)
        }
    });
}


</script>
@endpush
