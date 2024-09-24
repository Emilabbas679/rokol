@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<!-- Breadcrumb -->
<div class="section_wrap wrap_breadcrumb_profile">
    <div class="main_center clearfix">
        <ul class="breadcrumb_list">
            <li class="">
                <a href="#">Sifarişlərim</a>
            </li>
            <li class="">
                <a href="#">Seçilmişlərim</a>
            </li>
            <li class="active">
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

<div class="section_wrap wrap_address_page my_address">
    <div class="main_center clearfix">
        <div class="sect_body clearfix">

            <div class="adrs_container ">
                <div class="sect_header clearfix">
                    <h2 class="sect_title">Ünvanlarım </h2>
                    <button type="button" class="filter_btn btn_create btn_create_address"><span>Yeni ünvan yarat</span> </button>
                </div>
                <div class="my_adress_sect">
                    <div class="my_adress_item" id="my_address_1">
                        <div class="my_adress_content">
                            <div class="my_adrs_title">Ev ünvanı</div>
                            <div class="my_adrs_info">Emil Hasanzadeh</div>
                            <div class="my_adrs_info">+994 000 00 00</div>
                            <div class="my_adrs_info">Bakı-Sumqayıt yolu, 13,5 km AZ0123 Bakı, Azərbaycan</div>
                            <div class="my_adrs_info">Bakı</div>
                        </div>
                        <div class="bsk_icons">
                            <span class="delete "></span>
                            <span class="edit "></span>
                        </div>
                    </div>
                    <div class="my_adress_item" id="my_address_2">
                        <div class="my_adress_content">
                            <div class="my_adrs_title">Ev ünvanı2</div>
                            <div class="my_adrs_info">Emil Hasanzadeh2</div>
                            <div class="my_adrs_info">+994 000 00 00</div>
                            <div class="my_adrs_info">Bakı-Sumqayıt yolu, 13,5 km AZ0123 Bakı, Azərbaycan</div>
                            <div class="my_adrs_info">Sumqayıt</div>
                        </div>
                        <div class="bsk_icons">
                            <span class="delete "></span>
                            <span class="edit "></span>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
<!-- Wrap Category section -->


<!-- Modal Section -->
<div class="modal" data-id="create_address_modal">
    <div class="modal_section">
        <div class="modal_container">
            <div class="modal_header">
                <h5 class="modal_title">Yeni ünvan yarat</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form action="#" method="post" class="create_address_form">
                    <div class="row">
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label">Ad</label>
                                <input type="text" name="firstname" placeholder="Ad" value="" class="item_input" >
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label">Soyad</label>
                                <input type="text" name="lastname" placeholder="Soyad" value="" class="item_input" >
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label">Telefon</label>
                                <input type="text" name="phone" placeholder="Telefon" value="" class="item_input phone" >
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label">Şəhər/Rayon</label>
                                <input type="text" name="city" placeholder="Şəhər/Rayon" value="" class="item_input" >
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>

                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label">Ünvan</label>
                        <input type="text" name="address" placeholder="Ünvan" value="" class="item_input" >
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <div class="security_content">
                        Yükünüzün problemsiz sizə çatması üçün məhəllə, küçə, küçə və bina kimi ətraflı məlumatları mütləq daxil edin.
                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label">Ünvan başlığı</label>
                        <input type="text" name="addresstitle" placeholder="Ünvan başlığı" value="" class="item_input" >
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <button type="submit" class="btn_sign submit_btn">Yadda saxla</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Section -->

@endsection

@push('js')
<script>
$(document).ready(function() {
    $(".phone").inputmask({
        "mask": "+(999) 99 999 99 99",
    });
});
</script>
<script>
$('.btn_create_address').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(".modal").addClass("opened");
});
</script>

<script>
$('.address_label').click(function() {
    $(this).parents(".adrs_container").find(".cr_adr_row").removeClass("select_label");
    $(this).parents(".cr_adr_row").addClass("select_label");
    $(this).siblings(".my_adress_sect").find(".my_adress_item").removeClass("select_my_address");
    $(this).siblings(".my_adress_sect").find("#my_address_1").addClass("select_my_address");
});

$('.my_adress_item').click(function() {
    $(this).siblings().removeClass("select_my_address");
    $(this).addClass("select_my_address");
});
</script>
<script>
$(document).ready(function() {
    $(".edit").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("doedit");
    });
    $(".delete").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dodel");
    });
});
</script>
@endpush
