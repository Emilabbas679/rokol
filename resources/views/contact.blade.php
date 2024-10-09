@extends('layout')
@section('title', translate('contact'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Category section -->

    <div class="section_wrap wrap_contact_page">
        <div class="main_center clearfix">
            <div class="sect_body clearfix">

                <div class="adrs_container clearfix">
                    <div class="sect_header clearfix">
                        <h2 class="sect_title">@lang('Əlaqə') </h2>
                    </div>
                    <form action="{!! route('messages.store') !!}" method="post" class="create_address_form clearfix">
                        @csrf
                        <div class="left_setting">
                            <ul class="adrs_list">
                                <li>
                                    <span class="adr_name">@lang('Telefon nömrəsi'):</span>
                                    <a href="tel:*3030" class="adr_info"><sup>*</sup>3030</a>
                                </li>
                                <li>
                                    <span class="adr_name">@lang('E-poçt'):</span>
                                    <span class="adr_info">
                                    <a href="mailto:info@rokol.az">info@rokol.az</a>
                                </span>
                                </li>
                                <li>
                                    <span class="adr_name">@lang('Ünvan'):</span>
                                    <span class="adr_info adr_info_val">Bakı-Sumqayıt yolu, 13,5 km AZ0123 Bakı, Azərbaycan</span>
                                </li>
                            </ul>
                            <div class="map">
                                <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.510857927303!2d49.744262089451006!3d40.46396197911362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403085eb30cc3c53%3A0x7566e0828001f253!2sRokol%20boya%20zavodu!5e0!3m2!1str!2saz!4v1727105548709!5m2!1str!2saz"
                                        width="600" height="450"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="clearfix">
                                <div class="adrs_head">
                                    @lang('Sosial şəbəkələrimiz'):
                                </div>
                                <ul class="socials">
                                    <li>
                                        <a href="https://www.facebook.com/RokolBoyalari" class="social_icon"
                                           target="_blank">
                                        <span class="scl_icn">
                                            <img src="https://rokol.ain.az/img/icons/fb_w.svg?v1" alt="Facebook">
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/rokolboyalari/" class="social_icon"
                                           target="_blank">
                                        <span class="scl_icn">
                                            <img src="https://rokol.ain.az/img/icons/ins_w.svg?v1" alt="Instagram">
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/rokol-boyalar%C4%B1/"
                                           class="social_icon" target="_blank">
                                        <span class="scl_icn">
                                            <img src="https://rokol.ain.az/img/icons/lnkd_w.svg?v1" alt="Linkedn">
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/@MatanatAcompany" class="social_icon"
                                           target="_blank">
                                        <span class="scl_icn">
                                            <img src="https://rokol.ain.az/img/icons/ytb_w.svg?v1" alt="Youtube">
                                        </span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="" class="social_icon" target="_blank">
                                            <span class="scl_icn">
                                                <img src="https://rokol.ain.az/img/icons/tiktok_w.svg?v1" alt="Tiktok">
                                            </span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="right_setting">
                            <div class="sect_header clearfix">
                                <h2 class="sect_title">@lang('Bizə yazın')</h2>
                            </div>
                            <div class="row_setg">
                                <label class="itm_inp_label" for="firstname">@lang('Ad')</label>
                                <div class="form_item ">
                                    <input type="text" name="firstname" placeholder="@lang('Ad')"
                                           value="{{ old('firstname') }}" id="firstname" class="item_input">
                                    @error('firstname')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row_setg">
                                <label class="itm_inp_label" for="lastname">@lang('Soyad')</label>
                                <div class="form_item ">
                                    <input type="text" name="lastname" placeholder="@lang('Soyad')"
                                           value="{!! old('lastname') !!}" id="lastname" class="item_input">
                                    @error('lastname')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row_setg">
                                <label class="itm_inp_label" for="phone">@lang('Telefon')</label>
                                <div class="form_item ">
                                    <input type="text" name="phone" placeholder="@lang('Telefon')"
                                           value="{{ old('phone') }}" id="phone" class="item_input phone">
                                    @error('phone')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row_setg">
                                <label class="itm_inp_label" for="email">@lang('E-poçt')</label>
                                <div class="form_item ">
                                    <input type="text" name="email" placeholder="@lang('E-poçt')"
                                           value="{{ old('email') }}" id="email" class="item_input">
                                    @error('email')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row_setg">
                                <label class="itm_inp_label" for="content">@lang('Yazın')</label>
                                <div class="form_item ">
                                    <textarea name="content" placeholder="@lang('Yazın')" class="item_input"
                                              id="content" style="height: 140px;">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="error_type">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn_sign submit_btn">@lang('Göndər')</button>
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
