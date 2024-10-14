@extends('layout')
@section('title', translate('login'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Sign section -->
    <div class="section_wrap wrap_sign_page">

        <div class="section_wrap wrap_sign_items">

                <div class="reg_text" style="@if(!session()->has('success_register')) display:none @endif">
                    <span>
                        @lang('Qeydiyyat uğurla tamamlandı daxil ola bilərsiniz')
                    </span>
                </div>

            <div class="section_wrap wrap_sign_content ">
                <div class="benefit_tabs">
                    <div class="sign_header">
                        <div class="sign_title">Şəxsi kabinetə xoş gəlmisiniz</div>
                        <div class="sign_info">Giriş məlumatlarını daxil edin</div>
                    </div>
                    <div class="sign_tab_sect">
                        <div class="bf_tb_hd">
                            <span class="glider "></span>
                            <div class="bt_tb_title clicked_tab_btn " data-id="0"><span>E-poçt ünvanı</span></div>
                            <div class="bt_tb_title clicked_tab_btn " data-id="1"><span>Telefon nömrəsi</span></div>
                        </div>
                    </div>
                    <div class="bf_tb_content clearfix">

                        <div class="bf_tb_items active" data-id="0">

                            <form action="{!! route('login') !!}" method="post">
                                @csrf
                                <div class="form_item ">
                                    <input type="text" name="email" placeholder="E-poçt ünvanı" value=""
                                           class="item_input">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                                <div class="form_item">
                                    <input type="password" name="password" placeholder="Şifrə" value=""
                                           class="item_input ">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                    <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                    </div>
                                </div>
                                <a href="#" class="forgot_password">Şifrəni unutmusan? </a>
                                <div class="form_item">
                                    <button type="submit" class="btn_sign submit_btn">Daxil ol</button>
                                </div>
                                <div class="form_item">
                                    <a href="{!! route('register') !!}" class="btn_sign link_btn">Qeydiyyatdan keç</a>
                                </div>
                            </form>

                        </div>
                        <div class="bf_tb_items" data-id="1">

                            <form action="{!! route('login') !!}" method="post">
                                @csrf
                                <div class="form_item ">
                                    <input type="text" name="phone" placeholder="Telefon nömrəsi (+994)" value=""
                                           class="item_input phone">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                                <div class="form_item ">
                                    <input type="password" name="password" placeholder="Şifrə" value=""
                                           class="item_input ">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                    <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                    </div>
                                </div>
                                <a href="#" class="forgot_password">Şifrəni unutmusan? </a>
                                <div class="form_item">
                                    <button type="submit" class="btn_sign submit_btn">Daxil ol</button>
                                </div>
                                <div class="form_item">
                                    <a href="{!! route('register') !!}" class="btn_sign link_btn">Qeydiyyatdan keç</a>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Wrap Sign section -->

@endsection

@push('js')

    <script>
        $(document).ready(function () {

            $(".phone").inputmask({
                "mask": "+(999) 99 999 99 99",
            });

        });
    </script>
    <script>
        $(".show-password, .hide-password").on('click', function () {

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
