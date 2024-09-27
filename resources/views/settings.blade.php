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
            <li class="">
                <a href="#">Ünvanlarım</a>
            </li>
            <li class="active">
                <a href="#">Şəxsi məlumatlarım</a>
            </li>
        </ul>

        <a href="#" class="login_btn">Çıxış et</a>
    </div>
</div>
<!-- Breadcrumb -->

<div class="section_wrap wrap_profile_sect">
    <div class="main_center clearfix">
        <div class="sect_body clearfix">

            <div class="adrs_container clearfix">
                <form action="#" method="post" class="create_address_form clearfix">
                    <div class="left_setting">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">Şəxsi məlumatlarım </h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">Ad</label>
                            <div class="form_item ">
                                <input type="text" name="firstname" placeholder="Ad" value="Azizxan Sadiyev" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">Telefon</label>
                            <div class="form_item ">
                                <input type="text" name="lastname" placeholder="Telefon" value="+994 55 000 00 00" class="item_input phone">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">E-poçt ünvanı</label>
                            <div class="form_item ">
                                <input type="text" name="email" placeholder="E-poçt ünvanı" value="xataitest@gmail.com" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="right_setting">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">Şifrəni dəyiş </h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">Hazırki şifrə</label>
                            <div class="form_item">
                                <input type="password" name="password" placeholder="Hazırki şifrə" value="123456" class="item_input ">
                                <!-- <div class="error_type">Supporting text</div> -->
                                <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">Yeni şifrə</label>
                            <div class="form_item">
                                <input type="password" name="password" placeholder="Yeni şifrə" value="" class="item_input ">
                                <!-- <div class="error_type">Supporting text</div> -->
                                <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">Yeni şifrə təkrar</label>
                            <div class="form_item">
                                <input type="password" name="password" placeholder="Yeni şifrə təkrar" value="" class="item_input ">
                                <!-- <div class="error_type">Supporting text</div> -->
                                <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row_setg">
                        <div class="left_setting">
                            <button type="submit" class="btn_sign submit_btn">Yadda saxla</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Wrap Category section -->

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
$(".show-password, .hide-password").on('click', function() {

    var passwordId = $(this).parents('.form_item').find('input');

    if ($(this).hasClass('show-password')) {
        $(passwordId).attr("type", "text");
        $(this).parent().find(".show-password").hide();
        $(this).parent().find(".hide-password").show();
    } else {
        $(passwordId).attr("type", "password");
        $(this).parent().find(".hide-password").hide();
        $(this).parent().find(".show-password").show();
    }
});
</script>
@endpush
