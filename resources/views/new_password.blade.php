@extends('layout')
@section('title', 'new_pass')
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
                <div class="sign_title">Yeni şifrə yarat</div>
                <!-- <div class="sign_info">Telefon nömrənizi daxil edin</div> -->
            </div>
            <form action="#" method="post">
                <div class="form_item">
                    <input type="password" name="password" placeholder="Şifrə" value="" class="item_input " >
                    <!-- <div class="error_type">Warning text</div> -->
                    <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                    </div>
                </div>
                <div class="form_item">
                    <input type="password" name="password" placeholder="Şifrə təkrar" value="" class="item_input " >
                    <div class="error_type">Warning text</div>
                    <div class="pass_eye">
                        <span class="password-showhide">
                            <span class="show-password"> </span>
                            <span class="hide-password"> </span>
                        </span>
                    </div>
                </div>
                <div class="form_item">
                    <button type="submit" class="btn_sign submit_btn">Şifrəni dəyiş </button>
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
