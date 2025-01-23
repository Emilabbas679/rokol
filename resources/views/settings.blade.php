@extends('layout')
@section('title', translate('settings'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<!-- Breadcrumb -->
@include('partials.breadcrumbs')
<!-- Breadcrumb -->

<div class="section_wrap wrap_profile_sect">
    <div class="main_center clearfix">
        <div class="sect_body clearfix">

            <div class="adrs_container clearfix">
                <form action="{!! route('settings.update') !!}" method="post" class="create_address_form clearfix">
                    @csrf
                    @method('PUT')
                    <div class="left_setting">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">{{translate('my_information')}}</h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('name_surname')}}</label>
                            <div class="form_item ">
                                <input type="text" name="full_name" required placeholder="{{translate('name_surname')}}" value="{{ $user->full_name }}" class="item_input">
                                @error('full_name')
                                <div class="error_type">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('phone')}}</label>
                            <div class="form_item ">
                                <input type="text" placeholder="{{translate('phone')}}" value="{!! $user->phone !!}" class="item_input phone">
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('email')}}</label>
                            <div class="form_item ">
                                <input type="text" placeholder="{{translate('email')}}" value="{!! $user->email !!}" class="item_input">
                            </div>
                        </div>
                    </div>
                    <div class="right_setting">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">{{translate('change_pass')}}</h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('current_pass')}}</label>
                            <div class="form_item">
                                <input type="password" required name="current_password" placeholder="{{translate('current_pass')}}" class="item_input">
                                @error('current_password')
                                <div class="error_type">{{ $message }}</div>
                                @enderror
                                <div class="pass_eye">
                                    <span class="password-showhide">
                                        <span class="show-password"> </span>
                                        <span class="hide-password"> </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('new_pass')}}</label>
                            <div class="form_item">
                                <input type="password" required name="password" placeholder="{{translate('new_pass')}}" class="item_input">
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
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">{{translate('repeat_new_pass')}}</label>
                            <div class="form_item">
                                <input type="password" required name="password_confirmation" placeholder="{{translate('repeat_new_pass')}}" class="item_input">
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
                            <button type="submit" class="btn_sign submit_btn">{{translate('remember')}}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Wrap Category section -->
<!-- Modal Section -->
<div class="modal" id="new_address_modal" data-id="create_address_modal">
    <div class="modal_section">
        <div class="modal_container phone_modal">
            <div class="modal_header">
                <h5 class="modal_title">{{translate('create_new_address')}}</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form action="{!! route('addresses.store') !!}" method="post" class="create_address_form" id="address_form">
                    <div class="security_content">
                        {{translate('send_code')}}
                    </div>

                    <div class="row">
                            <div class="col">
                                <div class="form_item ">
                                    <input type="text"  name="" class="item_input" maxlength="1" required>
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <input type="text"  name="" class="item_input" maxlength="1" required>
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <input type="text"  name="" class="item_input " maxlength="1" required>
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <input type="text"  name="" 
                                           class="item_input" maxlength="1" required>
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>

                        </div>

                    <button type="submit" class="btn_sign submit_btn submit_address">{{translate('remember')}}</button>

                    <a href="javascript:void(0)" class="security_content modal_little_content modal_centered resend_code">
                        {{translate('resend_code')}}
                    </a>
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

    $('.phone_modal input').on('input', function() {
        if ($(this).val().trim() !== '') {
            $(this).addClass('filled');
        } else {
            $(this).removeClass('filled');
        }
    });
    $('.phone_modal input').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 1) {
            $(this).parents(".col").next('.col').find(".item_input").focus();
        }
    });
    $('.phone_modal input').on('keydown', function(e) {
        if (e.key === 'Backspace' && this.value.length === 0) {
            $(this).parents(".col").prev('.col').find(".item_input").focus();
        }
    });
    $(".submit_btn").click(function(){
        $(".modal").addClass("opened")
    })
    var countdownInterval;
    function startCountdown() {
        var countdown = 5; 
        clearInterval(countdownInterval); 
        $('.message').text(''); 
        $('.resend_code')
            .text('Kod yeniden gönderildi!')
            .css('pointer-events', 'none')
            .css('color', 'grey'); 
        countdownInterval = setInterval(function() {
            
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;
            var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
            
            $('.message').text(formattedTime);
            countdown--;
            
            if (countdown < 0) {
                clearInterval(countdownInterval); 
                $('.message').text(''); 
                $('.resend_code')
                    .text('Kodu yenidən göndər')
                    .css('pointer-events', 'auto') 
                    .css('color', '#414752'); 
            }
        }, 1000);
    }

    $('.resend_code').on('click', function() {
        startCountdown(); 
    });
</script>
@endpush
