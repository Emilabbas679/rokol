@extends('layout')
@section('title', 'Settings' /*$category['name'][app()->getLocale() ?? '']*/)
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
                            <h2 class="sect_title">@lang('Şəxsi məlumatlarım')</h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">@lang('Ad, Soyad')</label>
                            <div class="form_item ">
                                <input type="text" name="full_name" required placeholder="@lang('Ad, Soyad')" value="{{ $user->full_name }}" class="item_input">
                                @error('full_name')
                                <div class="error_type">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">@lang('Telefon')</label>
                            <div class="form_item ">
                                <input type="text" placeholder="@lang('Telefon')" value="{!! $user->phone !!}" class="item_input phone">
                            </div>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">@lang('E-poçt ünvanı')</label>
                            <div class="form_item ">
                                <input type="text" placeholder="@lang('E-poçt ünvanı')" value="{!! $user->email !!}" class="item_input">
                            </div>
                        </div>
                    </div>
                    <div class="right_setting">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">@lang('Şifrəni dəyiş')</h2>
                        </div>
                        <div class="row_setg">
                            <label class="itm_inp_label">@lang('Hazırki şifrə')</label>
                            <div class="form_item">
                                <input type="password" required name="current_password" placeholder="@lang('Hazırki şifrə')" class="item_input">
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
                            <label class="itm_inp_label">Yeni şifrə</label>
                            <div class="form_item">
                                <input type="password" required name="password" placeholder="@lang('Yeni şifrə')" class="item_input">
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
                            <label class="itm_inp_label">@lang('Yeni şifrə təkrar')</label>
                            <div class="form_item">
                                <input type="password" required name="password_confirmation" placeholder="@lang('Yeni şifrə təkrar')" class="item_input">
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
<!-- Modal Section -->
<div class="modal" id="new_address_modal" data-id="create_address_modal">
    <div class="modal_section">
        <div class="modal_container phone_modal">
            <div class="modal_header">
                <h5 class="modal_title">Yeni ünvan yarat</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form action="{!! route('addresses.store') !!}" method="post" class="create_address_form" id="address_form">
                    <div class="security_content">
                        @lang('+994 55 *** ** 20 nömrəsinə SMS kod göndərildi')
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

                    <button type="submit" class="btn_sign submit_btn submit_address">@lang('Yadda saxla')</button>

                    <div class="security_content modal_little_content">
                        @lang('+994 55 *** ** 20 nömrəsinə SMS kod göndərildi')
                    </div>
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
</script>
@endpush
