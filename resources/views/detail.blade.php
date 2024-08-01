@extends('layout')
@section('title', 'Error')
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
                <a href="#">Məhsullar</a>
                <a href="#">Rokol Sellülozik Boya</a>
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
                            <img src="{{asset('img/item.png')}}" alt="product" />
                        </div>
                    </div>
                </div>
                <div class="wrap_right">
                    <div class="product_detail">
                        <div class="product_content_sect">
                            <div class="product_info_table">

                                <div class="pr_tbl_left">
                                    <h1 class="product_title">Sellülozik Boya</h1>
                                    <p class="pr_short_info">Məhsulun kodu: T8850-000003</p>

                                    <div class="price_section">
                                        <div class="pr_price_info">
                                            <div class="itm_price">
                                                <span class="old-price">5.00 AZN</span>
                                                <span class="new-price">4.50 AZN</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr_row">
                                        <div class="pr_cat_name">Kateqoriya:</div>
                                        <div class="pr_cat_info">Məhsullar</div>
                                    </div>
                                    <div class="pr_row">
                                        <div class="pr_cat_name">Tipi:</div>
                                        <div class="pr_cat_info">Sellülozik</div>
                                    </div>
                                    <div class="pr_row">
                                        <div class="pr_cat_name">Görünüş:</div>
                                        <div class="pr_cat_info">Şəffaf</div>
                                    </div>
                                    <div class="pr_row">
                                        <div class="pr_cat_name">Tətbiq sahələri:</div>
                                        <div class="pr_cat_info">Daxili cəbhə</div>
                                    </div>
                                    <div class="choose_color">
                                        <div class="pr_select_title">Rəngi seç</div>
                                        <div class="filter_check_items">
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="color" value="1">
                                                <span style="background-color: #C1AC93;"></span>
                                            </label>
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="color" value="2">
                                                <span style="background-color: #BB272D;"></span>
                                            </label>
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="packaging" value="3">
                                                <span style="background-color: #7a1115;"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="choose_weight">
                                        <div class="pr_select_title">Çəkini seç</div>
                                        <div class="filter_check_items">
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="packaging" value="1">
                                                <span>2.5 Kq</span>
                                            </label>
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="packaging" value="1">
                                                <span>7.5 Kq</span>
                                            </label>
                                            <label class="f_check_type radio_btn">
                                                <input type="checkbox" name="packaging" value="1">
                                                <span>12.5 Kq</span>
                                            </label>
                                        </div>
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
                                    <!-- stocked, unstocked -->
                                    <div class="itm_stock stocked">
                                        <span class="stock_text">Stokda: 25 ədəd </span>
                                    </div>
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
                                        <h6 class="indicator_title">Məhsul haqqında :</h6>
                                        <p>Alkid əsaslı, yüksək örtmə qabliyyətinə, saralmağa qarşı müqavimətə, sürtünməyə və suya qarşı dayanıqlığa malik, asan silinə bilən və mükəmməl yayılma gücü sayəsində asan istifadəni təmin edən sintetik boyadır.</p>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">İstifadə Sahələri :</h6>
                                        Bu boyadan:
                                        <ul>
                                            <li>bütün növ metal, taxta, suvaq və beton səthlərdə istifadə olunur.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Üstünlükləri :</h6>
                                        <ul>
                                            <li>yüksək örtmə qabliyyətinə malikdir;</li>
                                            <li>saralmağa qarşı müqavimətlidir;</li>
                                            <li>sürtünməyə və suya qarşı dayanıqlıdır;</li>
                                            <li>asan silinir;</li>
                                            <li>mükəmməl yayılma qabiliyyətinə malikdir</li>
                                            <li>istifadəsi asandır.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Sərfiyyat :</h6>
                                        <ul>
                                            <li>1 m2 səthə 80 - 100 qr boya istifadə oluna bilər.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Saxlama müddəti :</h6>
                                        <ul>
                                            <li>Açılmamış qablarda, sərin yerdə 3 il saxlanıla bilər.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Xəbərdarlıqlar :</h6>
                                        <ul>
                                            <li>boya buxarının nəfəsə daxil olmaması və həmçinin dəriyə və gözə düşməməsi üçün fərdi mühavizə vasitələrindən istifadə edin;</li>
                                            <li>uşaqların əli çatmayan yerlərdə saxlayın;</li>
                                            <li>oddan qoruyun.</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="bf_tb_items " data-id="1">
                                <div class="indicators_content">

                                    <div class="indicators_items">
                                        <h6 class="indicator_title">İstifadə Sahələri :</h6>
                                        Bu boyadan:
                                        <ul>
                                            <li>bütün növ metal, taxta, suvaq və beton səthlərdə istifadə olunur.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Üstünlükləri :</h6>
                                        <ul>
                                            <li>yüksək örtmə qabliyyətinə malikdir;</li>
                                            <li>saralmağa qarşı müqavimətlidir;</li>
                                            <li>sürtünməyə və suya qarşı dayanıqlıdır;</li>
                                            <li>asan silinir;</li>
                                            <li>mükəmməl yayılma qabiliyyətinə malikdir</li>
                                            <li>istifadəsi asandır.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Sərfiyyat :</h6>
                                        <ul>
                                            <li>1 m2 səthə 80 - 100 qr boya istifadə oluna bilər.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Saxlama müddəti :</h6>
                                        <ul>
                                            <li>Açılmamış qablarda, sərin yerdə 3 il saxlanıla bilər.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Xəbərdarlıqlar :</h6>
                                        <ul>
                                            <li>boya buxarının nəfəsə daxil olmaması və həmçinin dəriyə və gözə düşməməsi üçün fərdi mühavizə vasitələrindən istifadə edin;</li>
                                            <li>uşaqların əli çatmayan yerlərdə saxlayın;</li>
                                            <li>oddan qoruyun.</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="bf_tb_items " data-id="2">
                                <div class="indicators_content">

                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Saxlama müddəti :</h6>
                                        <ul>
                                            <li>Açılmamış qablarda, sərin yerdə 3 il saxlanıla bilər.</li>
                                        </ul>
                                    </div>
                                    <div class="indicators_items">
                                        <h6 class="indicator_title">Xəbərdarlıqlar :</h6>
                                        <ul>
                                            <li>boya buxarının nəfəsə daxil olmaması və həmçinin dəriyə və gözə düşməməsi üçün fərdi mühavizə vasitələrindən istifadə edin;</li>
                                            <li>uşaqların əli çatmayan yerlərdə saxlayın;</li>
                                            <li>oddan qoruyun.</li>
                                        </ul>
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
                                    <img src="{{asset('img/item.png')}}" alt="product" />
                                </a>
                                <div class="item_content">
                                    <h4 class="itm_title">
                                        <span>
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
                                    <img src="{{asset('img/item.png')}}" alt="product" />
                                </a>
                                <div class="item_content">
                                    <h4 class="itm_title">
                                        <span>
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
                                    <img src="{{asset('img/item.png')}}" alt="product" />
                                </a>
                                <div class="item_content">
                                    <h4 class="itm_title">
                                        <span>
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
                                    <img src="{{asset('img/item.png')}}" alt="product" />
                                </a>
                                <div class="item_content">
                                    <h4 class="itm_title">
                                        <span>
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

    $('.pr_plus').on('click', function() {
        var currentCount = parseInt($('.product_counter input').val());
        if (currentCount < maxCount) {
            currentCount++;
            $('.product_counter input').val(currentCount);
            $('.pr_number').text(currentCount);
        }
    });

    $('.pr_minus').on('click', function() {
        var currentCount = parseInt($('.product_counter input').val());
        if (currentCount > minCount) {
            currentCount--;
            $('.product_counter input').val(currentCount);
            $('.pr_number').text(currentCount);
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
</script>
@endpush
