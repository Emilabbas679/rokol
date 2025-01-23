@extends('layout')
@section('title',translate('forgot_pass'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<div class="section_wrap wrap_sign_page">

    <div class="section_wrap wrap_sign_items ">

        <div class="section_wrap wrap_sign_content ">
            <div class="sign_header">
                <div class="sign_title">{{translate('forgot_pass')}}</div>
                <div class="sign_info">{{translate('write_phone_number')}}</div>
            </div>
            <form method="post" id="forgot_password_form">
                @csrf
                <div class="form_item ">
                    <input type="text" name="phone" placeholder="{{translate('phone_number_994')}}" class="item_input phone" value="994" required>
                    @error('phone')
                        <div class="error_type">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form_item">
                    <button type="submit" class="btn_sign submit_btn">{{translate('continue')}}</button>
                </div>
                <div class="form_item">
                    <a href="{!! back()->getTargetUrl() !!}" class="btn_sign link_btn"><span class="back_link"></span>{{translate('go_back')}} </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal reg_modal" id="code_modal" data-id="code_modal">
    <div class="modal_section">
        <div class="modal_container phone_modal">
            <div class="modal_header">
                <h5 class="modal_title">{{translate('approval')}}</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form id="code_form">
                    <div class="security_content">
                        <span class="phone_number"></span>
                            {{translate('phone_code_send')}}
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form_item ">
                                <input type="text" name="code[]" class="item_input" maxlength="1" required>
                                {{--									 <div class="error_type">Supporting text</div>--}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <input type="text" name="code[]" class="item_input" maxlength="1" required>
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <input type="text" name="code[]" class="item_input " maxlength="1" required>
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <input type="text" name="code[]"
                                       class="item_input" maxlength="1" required>
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>

                    </div>

                    <div class="error_type" id="code_error" style="display:none">{{translate('code_error')}}</div>
                    <button type="submit" class="btn_sign submit_btn submit_code">{{translate('send')}}</button>

                    <a href="javascript:void(0)"
                       class="security_content modal_little_content modal_centered resend_code">
                       {{translate('resend_code')}}
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Section -->

<div class="modal" id="message_modal" data-id="message_modal">
    <div class="modal_section">
        <div class="modal_container phone_modal">
            <div class="modal_header">
                <h5 class="modal_title"></h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">

            </div>
        </div>
    </div>
</div>

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
$('.phone_modal input').on('input', function () {
    if ($(this).val().trim() !== '') {
        $(this).addClass('filled');
    } else {
        $(this).removeClass('filled');
    }
});
$('.phone_modal input').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length === 1) {
        $(this).parents(".col").next('.col').find(".item_input").focus();
    }
});
$('.phone_modal input').on('keydown', function (e) {
    if (e.key === 'Backspace' && this.value.length === 0) {
        $(this).parents(".col").prev('.col').find(".item_input").focus();
    }
});

function sendCode(isFirst) {
    let phoneEl = $('input[name="phone"]');
    phoneEl.next().remove();
    let phoneNumber = phoneEl.val();
    let validationNumber = phoneNumber.replaceAll(/\(|\)|_/gi, '').replaceAll(' ', '');
    if (validationNumber.trim() !== '' && validationNumber.length === 13) {
        $.ajax({
            url: '{!! route('password.code.send') !!}',
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                'phone': phoneNumber
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status === 'success') {
                    $('.phone_number').text(phoneNumber);
                    if (isFirst) {
                        startCountdown();
                    }
                    $("#code_modal").addClass("opened");
                }
            },
            error: function (data) {
                $.each(data.responseJSON.errors, (key, value) => {
                    $(`input[name=${key}]`).next().remove();
                    $(`<div class="error_type">${value[0]}</div>`).insertAfter(`input[name=${key}]`);
                })
            },
        });
    }
    else {
        $(`<div class="error_type">@lang('Phone number not valid')</div>`).insertAfter(`input[name='phone']`);
    }
}

$(".submit_btn").click(function (e) {
    console.log("asdasdjknasdkjnasd");
    e.preventDefault();
    if ($(".submit_btn").hasClass('added')) {
        return;
    }else{
        sendCode(true);
    }
})
$(".submit_code").click(function (e) {
    e.preventDefault();
    $('#code_error').css('display', 'none');
    let code = $('#code_form').serialize();
    let data = $('#forgot_password_form').serialize();
    data = `${data}&${code}`;
    $.ajax({
        url: '{!! route('password.code.verify') !!}',
        method: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data,
        dataType: 'JSON',
        success: function (data) {
            if (data.status === 'success') {
                window.location.href = '{!! route('password.reset.page') !!}';
            } else {
                $('#code_error').css('display', 'block');
            }
        },
        error: function (data) {
            $('#message_modal.modal_title').text('{!! __('Təsdiqləmə xətası') !!}')
            $('#message_modal.modal_title').text(data.responseJSON.message);
            $("#code_modal").removeClass('opened');
            $("#message_modal").addClass('opened');
        },
    });
});


$('.submit_btn').click(function () {
    $(".submit_btn").addClass("added")
    setTimeout(function () {
        $(".submit_btn").removeClass("added")
    }, 10000)
});


var countdownInterval;

function startCountdown() {
    var countdown = 59;
    clearInterval(countdownInterval);
    $('.message').text('');
    $('.resend_code')
        .text('Kodu yenidən göndərildi!')
        .css('pointer-events', 'none')
        .css('color', 'grey');

    countdownInterval = setInterval(function () {

        var minutes = Math.floor(countdown / 60);
        var seconds = countdown % 60;
        var formattedTime = seconds;

        $('.resend_code').html('Kod yeniden göndərildi! ' + formattedTime);
        countdown--;

        if (countdown < 0) {
            clearInterval(countdownInterval);
            $('.message').text('');
            $('.resend_code')
                .html('Kodu yenidən gəndər')
                .css('pointer-events', 'auto')
                .css('color', '#414752');
        }
    }, 1000);
}

$('.resend_code').on('click', function () {
    startCountdown();
    sendCode(false);
});

</script>
@endpush
