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
                <div class="pr_like_button">
                    <!-- click after addclass "dofav" -->
                    <span class="favotites "></span>
                    <a href="#" class="share_product"></a>
                </div>


            </div>

            <!-- Product detail section -->
            <div class="section_wrap wrap_category wrap_detail_product">
                <div class="sect_body product_container clearfix">
                    <div class="wrap_left">
                        <div class="col_in">
                            <div class="fav_sect">
                                <div class="offer-tag">
                                    <p class="offer_val">HƏFTƏNİN TƏKLİFİ</p>
                                </div>
                            </div>
                            <a href="#" class="item_img">
                                <img src="{{asset('img/item.png')}}" alt="product" />
                            </a>
                        </div>
                    </div>
                    <div class="wrap_right">
                        <div class="product_detail">
                            <div class="product_content_sect">
                                <div class="product_info_table">

                                    <div class="pr_tbl_left">
                                        <h1 class="product_title">Sellülozik Boya</h1>
                                        <div class="pr_row">
                                            <div class="pr_cat_name">Kateqoriya:</div>
                                            <div class="pr_cat_info">Məhsullar</div>
                                        </div>
                                        <div class="pr_row">
                                            <div class="pr_cat_name">Məhsulun kodu:</div>
                                            <div class="pr_cat_info">T8850-000003</div>
                                        </div>
                                        <div class="pr_row">
                                            <h2 class="pr_second_title">Texniki parametrlər</h2>
                                        </div>
                                        <div class="pr_row">
                                            <div class="pr_cat_name">Tipi:</div>
                                            <div class="pr_cat_info">Sellülozik</div>
                                        </div>
                                        <div class="pr_row">
                                            <div class="pr_cat_name">Görünüş:</div>
                                            <div class="pr_cat_info">Şəffaf</div>
                                        </div>
                                    </div>
                                    <div class="pr_tbl_right">
                                        <div class="pr_main_buttons">
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/calculator.svg')}}" alt="calculator">
                                            </a>
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_tpdf.svg')}}" alt="pdf">
                                            </a>
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_mpdf.svg')}}" alt="pdf">
                                            </a>
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_video.svg')}}" alt="video">
                                            </a>
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_print.svg')}}" alt="print">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="product_select_proporties">
                                    <div class="pr_row">
                                        <div class="pr_slct_left">
                                            <div class="pr_select_title">Çəkini seç</div>
                                            <div class="filter_check_items">
                                                <label class="f_check_type">
                                                    <input type="radio" name="packaging" value="1">
                                                    <span>2.5 Kq</span>
                                                </label>
                                                <label class="f_check_type">
                                                    <input type="radio" name="packaging" value="1">
                                                    <span>7.5 Kq</span>
                                                </label>
                                                <label class="f_check_type">
                                                    <input type="radio" name="packaging" value="1">
                                                    <span>12.5 Kq</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="pr_slct_right">
                                            <div class="choose_color">
                                                <div class="pr_select_title">Rəngi seç</div>
                                                <div class="filter_check_items">
                                                    <label class="f_check_type">
                                                        <input type="radio" name="color" value="1">
                                                        <span style="background-color: #C1AC93;"></span>
                                                    </label>
                                                    <label class="f_check_type">
                                                        <input type="radio" name="color" value="2">
                                                        <span style="background-color: #BB272D;"></span>
                                                    </label>
                                                    <label class="f_check_type">
                                                        <input type="radio" name="packaging" value="3">
                                                        <span style="background-color: #7a1115;"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="pr_stock_info">
                                                <div class="itm_stock">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>
                                            <div class="pr_price_info">
                                                <div class="itm_price">
                                                    <span class="old-price">5.00 AZN</span>
                                                    <span class="new-price">4.50 AZN</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pr_row">
                                        <div class="pr_slct_left">
                                            <div class="filter_check_items">
                                                <div class="product_counter">
                                                    <input type="hidden" name="counter" value="0">
                                                    <button type="button" class="pr_btn_counter pr_minus"></button>
                                                    <div class="pr_number_sect">Ədəd <span class="pr_number"></span></div>
                                                    <button type="button" class="pr_btn_counter pr_plus"></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="pr_slct_right">
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
                <!-- Product detail section -->

                <!-- Product tab content -->
                <div class="section_wrap wrap_tab_product">
                    <div class="sect_body clearfix">

                        <div class="benefit_tabs">
                            <div class="bf_tb_hd">
                                <div class="bt_tb_title clicked_tab_btn active" data-id="0">Məhsul haqqında </div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="1">İstifadə Sahələri</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="2">Üstünlükləri</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="3">Texniki göstəricilər</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="4">Sərfiyyat</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="5">Saxlama müddəti</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="6">Xəbərdarlıqlar</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="7">Zəmanət</div>
                            </div>
                            <div class="bf_tb_content">
                                <div class="bf_tb_items " data-id="0"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz, şəffaf sellülozik tiner.</div>
                                <div class="bf_tb_items " data-id="1"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər </div>
                                <div class="bf_tb_items " data-id="2"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz</div>
                                <div class="bf_tb_items " data-id="3"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz, şəffaf sellülozik tiner.</div>
                                <div class="bf_tb_items " data-id="4"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz</div>
                                <div class="bf_tb_items " data-id="5"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz, şəffaf sellülozik tiner.</div>
                                <div class="bf_tb_items " data-id="6"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz</div>
                                <div class="bf_tb_items " data-id="7"><b>Məhsul haqqında :</b> Tərkibində qüvvətli həlledicilər olan rəngsiz, şəffaf sellülozik tiner.</div>
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
                                        <!-- click after addclass "dofav" -->
                                        <span class="favotites dofav"></span>
                                    </div>
                                    <a href="#" class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product" />
                                    </a>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                            Rokol
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_weight">
                                            2.5 kq
                                        </div>
                                        <div class="itm_price">
                                            5.00 AZN
                                        </div>
                                        <div class="itm_stock">
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
                                        <span class="favotites"></span>
                                    </div>
                                    <a href="#" class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product" />
                                    </a>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                            Rokol
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_weight">
                                            2.5 kq
                                        </div>
                                        <div class="itm_price">
                                            5.00 AZN
                                        </div>
                                        <div class="itm_stock">
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
                                            <p class="offer_val">HƏFTƏNİN TƏKLİFİ</p>
                                        </div>
                                        <!-- click after addclass "dofav" -->
                                        <span class="favotites "></span>
                                    </div>
                                    <a href="#" class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product" />
                                    </a>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                            Rokol
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_weight">
                                            2.5 kq
                                        </div>
                                        <div class="itm_price">
                                            <span class="old-price">5.00 AZN</span>
                                            <span class="new-price">4.50 AZN</span>
                                        </div>
                                        <div class="itm_stock">
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
                                        <span class="favotites"></span>
                                    </div>
                                    <a href="#" class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product" />
                                    </a>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                            Rokol
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_weight">
                                            2.5 kq
                                        </div>
                                        <div class="itm_price">
                                            5.00 AZN
                                        </div>
                                        <div class="itm_stock">
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
                                        <!-- click after addclass "dofav" -->
                                        <span class="favotites dofav"></span>
                                    </div>
                                    <a href="#" class="item_img">
                                        <img src="{{asset('img/item.png')}}" alt="product" />
                                    </a>
                                    <div class="item_content">
                                        <h4 class="itm_title">
                                            Rokol
                                        </h4>
                                        <div class="itm_info">
                                            Sellülozik Boya
                                        </div>
                                        <div class="itm_weight">
                                            2.5 kq
                                        </div>
                                        <div class="itm_price">
                                            5.00 AZN
                                        </div>
                                        <div class="itm_stock">
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

@endpush