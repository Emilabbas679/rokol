@extends('layout')
@section('title', translate('new_pass'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Sign section -->
<div class="section_wrap wrap_sign_page">

    <div class="section_wrap wrap_sign_items ">

        <div class="section_wrap wrap_sign_content ">

            @if($errors->any() && app()->environment('local'))
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            <div class="sign_header">
                <div class="sign_title">{{translate('create_new_pass')}}</div>
                <!-- <div class="sign_info">Telefon nömrənizi daxil edin</div> -->
            </div>
            <form action="{!! route('password.reset.do') !!}" method="post">
                @csrf
                <div class="form_item">
                    <input type="password" name="password" placeholder="{{translate('password')}}" class="item_input">
                    <!-- <div class="error_type">Warning text</div> -->
                    <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                    </div>
                </div>
                <div class="form_item">
                    <input type="password" name="password_confirmation" placeholder="{{translate('repeat_pass')}}" class="item_input" >
{{--                    <div class="error_type">Warning text</div>--}}
                    <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                    </div>
                </div>
                <div class="form_item">
                    <button type="submit" class="btn_sign submit_btn">{{translate('change_pass')}} </button>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- Wrap Sign section -->

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
