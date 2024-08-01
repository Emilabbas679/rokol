@extends('layout')
@section('title', translate('category'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<div class="section_wrap wrap_category">
    <div class="main_center clearfix">

        <div class="sect_body clearfix">
            <div class="wrap_left">
                <div class="filter_container">
                    <h2 class="filter_title">Filterlər</h2>

                    <div class="filter_items">
                        <div class="filter_head">
                            <h5>Məhsullar</h5>
                        </div>
                        <div class="select_item">
                            <div class="form_item">
                                <select name="month" class="js-example-basic-single " id="products_main" data-placeholder="Boyalar">
                                    <option value="0" selected>Sənaye boyaları</option>
                                    <option value="1">Epoksid boyaları</option>
                                    <option value="2">Poliretan boyaları</option>
                                    <option value="3">Sellülozik boyaları</option>
                                </select>
                                <span class="customDrop customDrop-main"></span>
                            </div>
                            <div class="form_item">
                                <select name="month" class="js-example-basic-single " id="products_other" data-placeholder="Boyalar">
                                    <option value="0" selected>Epoksid boyaları </option>
                                    <option value="1">Sənaye boyaları</option>
                                    <option value="2">Poliretan boyaları</option>
                                    <option value="3">Sellülozik boyaları</option>
                                </select>
                                <span class="customDrop customDrop-other"></span>
                            </div>
                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Qiymət</h5>
                        </div>
                        <div class="filter_check_items">


                            <div class="price_range_wrap">
                                <div class="price-input">
                                    <div class="field">
                                        <input type="number" class="input-min" value="">
                                        <label>₼</label>
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <input type="number" class="input-max" value="">
                                        <label>₼</label>
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="progress" style="left: 21.34%; right: 54.09%;"></div>
                                </div>
                                <div class="range-input price-field">
                                    <input type="range" name="min-price" class="range-min" min="0" max="10000" value="0" step="1">
                                    <input type="range" name="max-price" class="range-max" min="0" max="10000" value="10000" step="1">
                                </div>
                                <div class="price-wrap">
                                    <div class="price-wrap-1">
                                        <span class="minVal"></span>
                                        <label>AZN</label>
                                    </div>
                                    <div class="price-wrap-2">
                                        <span class="maxVal"></span>
                                        <label>AZN</label>
                                    </div>
                                </div>
                                <div class="custom_min_max" style="display: none;">
                                    <div class="row">
                                        <div class="col item_col">
                                            <div class="col_in">
                                                <input type="number" class="custom-min" placeholder="min" min="0" max="10000" value="">
                                            </div>
                                        </div>
                                        <div class="col item_col">
                                            <div class="col_in">
                                                <input type="number" class="custom-max" placeholder="max" min="0" max="10000" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="price_range_wrap">
                                    <div class="slider">
                                        <div class="progress" style="left: 0%; right: 0%;"></div>
                                    </div>
                                    <div class="range-input price-field">
                                        <input type="range" name="min-price" class="range-min" min="0" max="240" value="0" step="1">
                                        <input type="range" name="max-price" class="range-max" min="0" max="240" value="0" step="1">
                                    </div>
                                    <div class="price-wrap">
                                        <div class="price-wrap-1">
                                            <span class="minVal">0 </span>
                                            <label>AZN</label>
                                        </div>
                                        <div class="price-wrap-2">
                                            <span class="maxVal">240</span>
                                            <label>AZN</label>
                                        </div>
                                    </div>
                                    <div class="custom_min_max">
                                        <input type="number" class="custom-min" placeholder="min" min="0" max="240" value="0">
                                        <input type="number" class="custom-max" placeholder="max" min="0" max="240" value="0">
                                    </div>
                                </div> -->


                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Xüsusiyyətləri</h5>
                        </div>
                        <div class="filter_check_items">
                            <label class="f_check_type">
                                <input type="checkbox" name="specials" value="1">
                                <span>Sellülozik boya</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="specials" value="1">
                                <span>Silinə bilən</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="specials" value="1" checked>
                                <span>Antibakterial</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="specials" value="1">
                                <span>Yuyulan boya</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="specials" value="1">
                                <span>Antikorroziv</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Tipi</h5>
                        </div>
                        <div class="filter_check_items">
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Su əsaslı</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Sintetik</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Epoksi</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Sellülozik</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Tiner</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="type" value="1">
                                <span>Poliuretan</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Tətbiq sahələri</h5>
                        </div>
                        <div class="filter_check_items">
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Tavan</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Daş səth</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Epoksi</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Metal səth</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Tiner</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="application" value="1">
                                <span>Xarici cəbhə</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Görünüş</h5>
                        </div>
                        <div class="filter_check_items">
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Parlaq</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Mat</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Yarı-mat</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Yarı-parlaq</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Yarı-şəffaf</span>
                            </label>
                            <label class="f_check_type">
                                <input type="checkbox" name="views" value="1">
                                <span>Xarici cəbhə</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter_items drop_filter_item">
                        <div class="filter_head">
                            <h5>Qablaşdırma</h5>
                        </div>
                        <div class="filter_check_items">
                            <label class="f_check_type radio_btn">
                                <input type="checkbox" name=packaging" value="1">
                                <span>2.5 Kq</span>
                            </label>
                            <label class="f_check_type radio_btn">
                                <input type="checkbox" name=packaging" value="1">
                                <span>7.5 Kq</span>
                            </label>
                            <label class="f_check_type radio_btn">
                                <input type="checkbox" name=packaging" value="1">
                                <span>12.5 Kq</span>
                            </label>
                        </div>
                    </div>

                    <div class="filter_buttons">
                        <button type="button" class="filter_btn btn_reset">Sıfırla</button>
                        <button type="submit" class="filter_btn btn_send">Təsdiqlə</button>
                    </div>


                </div>
            </div>
            <div class="wrap_right">
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
                                <div class="offer-tag">
                                    <p class="offer_val">Həftənin təklifi</p>
                                </div>
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


                </div>

                <div class="sect_footer clearfix">
                    <a href="#" class="more">
                        Daha çox
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path
                                d="M12.5 16.8C11.8 16.8 11.1 16.53 10.57 16L4.05002 9.48001C3.76002 9.19001 3.76002 8.71001 4.05002 8.42001C4.34002 8.13001 4.82002 8.13001 5.11002 8.42001L11.63 14.94C12.11 15.42 12.89 15.42 13.37 14.94L19.89 8.42001C20.18 8.13001 20.66 8.13001 20.95 8.42001C21.24 8.71001 21.24 9.19001 20.95 9.48001L14.43 16C13.9 16.53 13.2 16.8 12.5 16.8Z"
                                fill="#00428E" />
                        </svg>
                    </a>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Wrap Category section -->

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
    // *Favorites 
    $(".favotites").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dofav");
    });
    // *Favorites
});
</script>
@endpush
