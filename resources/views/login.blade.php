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
                        {{translate('login_succes')}}
                    </span>
            </div>

            <div class="section_wrap wrap_sign_content ">
                <div class="benefit_tabs">
                    <div class="sign_header">
                        <div class="sign_title">{{translate('login_title')}}</div>
                        <div class="sign_info">{{translate('login_info')}}</div>
                    </div>
                    <div class="sign_tab_sect">
                        <div class="bf_tb_hd">
                            <span class="glider "></span>
                            <div class="bt_tb_title clicked_tab_btn" data-id="0"><span>{{translate('phone_number')}}</span></div>
                            <div class="bt_tb_title clicked_tab_btn" data-id="1"><span>{{translate('email')}}</span></div>
                        </div>
                    </div>
                    <div class="bf_tb_content clearfix">

                        <div class="bf_tb_items" data-id="1">

                            <form action="{!! route('login') !!}" method="post">
                                @csrf
                                <div class="form_item">
                                    <input type="text" name="email" placeholder="{{translate('email')}}" value=""
                                           class="item_input">
                                    @error('email')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form_item">
                                    <input type="password" name="password" placeholder="{{translate('password')}}" value=""
                                           class="item_input">
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
                                <a href="{!! route('password.phone') !!}"
                                   class="forgot_password">{{translate('forgot_pass')}}</a>
                                <div class="form_item">
                                    <button type="submit" class="btn_sign submit_btn">{{translate('login')}}</button>
                                </div>
                                <div class="form_item">
                                    <a href="{!! route('register') !!}"
                                       class="btn_sign link_btn">{{translate('register')}}</a>
                                </div>
                            </form>

                        </div>
                        <div class="bf_tb_items active" data-id="0">

                            <form action="{!! route('login') !!}" method="post">
                                @csrf
                                <div class="form_item">
                                    <input type="text" name="phone" placeholder="{{translate('phone_number')}}"
                                           value="994"
                                           class="item_input phone">
                                    @error('phone')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form_item">
                                    <input type="password" name="password" placeholder="{{translate('password')}}" value=""
                                           class="item_input">
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
                                <a href="{!! route('password.phone') !!}"
                                   class="forgot_password">{{translate('forgot_pass')}}</a>
                                <div class="form_item">
                                    <button type="submit" class="btn_sign submit_btn">{{translate('login')}}</button>
                                </div>
                                <div class="form_item">
                                    <a href="{!! route('register') !!}"
                                       class="btn_sign link_btn">{{translate('register')}}</a>
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
