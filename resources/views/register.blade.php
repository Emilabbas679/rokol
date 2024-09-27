@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Sign section -->
    <div class="section_wrap wrap_sign_page">

        <div class="section_wrap wrap_sign_items ">

            <div class="section_wrap wrap_sign_content ">
                <div class="sign_header">
                    <div class="sign_title">Qeydiyyatdan keç</div>
                    <div class="sign_info">Giriş məlumatlarını daxil edin</div>
                </div>
                <form action="{!! route('register') !!}" method="post">
                    @csrf
                    <div class="form_item ">
                        <input type="text" name="full_name" placeholder="@lang('Ad, Soyad')" class="item_input"
                               required>
                        @error('full_name')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item ">
                        <input type="text" name="phone" placeholder="@lang('Telefon nömrəsi (+994)')"
                               class="item_input phone" required>
                        @error('phone')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item ">
                        <input type="text" name="email" placeholder="@lang('E-poçt ünvanı')" class="item_input"
                               required>
                        @error('email')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item">
                        <input type="password" name="password" placeholder="@lang('Şifrə')" class="item_input "
                               required>
                        @error('password')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                        <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                        </div>
                    </div>
                    <div class="form_item">
                        <input type="password" name="password_confirmation" placeholder="@lang('Şifrə təkrar')"
                               class="item_input ">
                        <!-- <div class="error_type">Supporting text</div> -->
                        <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                        </div>
                    </div>
                    <div class="security_content">
                        Siz davam et düyməsini sıxmaqla <a href="#">İstifadəçi şərtlərini</a> və <a href="#">Məxfilik
                            siyasətini</a> qəbul etmiş olursunuz.
                    </div>
                    <div class="form_item">
                        <button type="submit" class="btn_sign submit_btn">Qeydiyyatdan keç</button>
                    </div>
                    <div class="form_item">
                        <a href="{!! route('login') !!}" class="btn_sign link_btn">Daxil ol</a>
                    </div>
                </form>


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
