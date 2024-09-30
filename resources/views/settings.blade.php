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
