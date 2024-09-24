@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Profile section -->
<!-- Breadcrumb -->
<div class="section_wrap wrap_breadcrumb_profile">
    <div class="main_center clearfix">
        <ul class="breadcrumb_list">
            <li class="active">
                <a href="#">Sifarişlərim</a>
            </li>
            <li class="">
                <a href="#">Seçilmişlərim</a>
            </li>
            <li class="">
                <a href="#">Ünvanlarım</a>
            </li>
            <li class="">
                <a href="#">Şəxsi məlumatlarım</a>
            </li>
        </ul>

        <a href="#" class="login_btn">Çıxış et</a>
    </div>
</div>
<!-- Breadcrumb -->


<div class="section_wrap wrap_category wrap_profile_sect wrap_orders">
    <div class="main_center clearfix">
        <div class="sect_header clearfix">
            <h2 class="sect_title">Sifarişlərim </h2>
            <div class="order_links">
                <a href="#" class="active">Davam edən</a>
                <a href="#" class="">Tamamlanmış</a>
            </div>
        </div>
        <div class="sect_body clearfix">
            <div class="row_list clearfix">

                <div class="order_items">
                    <!-- Order Header -->
                    <div class="order_header">
                        <div class="row">
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş No:</span>
                                    <span class="bck_itm_val">454396341</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş Tarixi:</span>
                                    <span class="bck_itm_val">9 Sentyabr 2024</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Məbləğ</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_val price">250 AZN</span>
                                </div>
                            </div>

                            <div class="col">
                                <span class="order_status completed">Tamamlandı</span>
                            </div>
                        </div>
                    </div>
                    <!-- Order Header -->
                    <!-- Order Items -->
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Items -->

                </div>
                <div class="order_items">
                    <!-- Order Header -->
                    <div class="order_header">
                        <div class="row">
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş No:</span>
                                    <span class="bck_itm_val">454396341</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş Tarixi:</span>
                                    <span class="bck_itm_val">9 Sentyabr 2024</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Məbləğ</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_val price">250 AZN</span>
                                </div>
                            </div>

                            <div class="col">
                                <span class="order_status preparing">Hazırlanır</span>
                            </div>
                        </div>
                    </div>
                    <!-- Order Header -->
                    <!-- Order Items -->
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Items -->

                </div>
                <div class="order_items">
                    <!-- Order Header -->
                    <div class="order_header">
                        <div class="row">
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş No:</span>
                                    <span class="bck_itm_val">454396341</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_name">Sifariş Tarixi:</span>
                                    <span class="bck_itm_val">9 Sentyabr 2024</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row_list">
                                    <span class="bck_itm_name">Məbləğ</span>
                                </div>
                                <div class="row_list">
                                    <span class="bck_itm_val price">250 AZN</span>
                                </div>
                            </div>

                            <div class="col">
                                <span class="order_status rejected">Ləğv olunmuş</span>
                            </div>
                        </div>
                    </div>
                    <!-- Order Header -->
                    <!-- Order Items -->
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col_in list_items">
                        <a href="https://rokol.ain.az/product/16" class="item_img">
                            <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                        </a>
                        <div class="item_content">
                            <div class="list_left_itm">
                                <h4 class="itm_title">
                                    <span class="itm_name">Rokol plus paint</span>
                                    <span class="itm_weight">10 Kq </span>
                                </h4>
                                <div class="itm_info">Sellülozik Boya</div>
                            </div>
                            <div class="list_right_itm">
                                <div class="itm_price">
                                    <span class="new-price">4.50 AZN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Items -->

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
