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

                        <a href="javascript:void(0)" class="security_content modal_little_content modal_centered resend_code">
                            Kodu yenidən göndər
                            <div class="message"></div>
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

        $('.resend_code').on('click', function() {
                // Bağlantı metnini değiştir
                $(this).text('Kod yeniden gönderildi!');

                // Bağlantıyı devre dışı bırak
                $(this).off('click').css('pointer-events', 'none').css('color', 'grey');

                // Geri sayım başlat
                var countdown = 30; // Geri sayım süresi (saniye)
                var countdownInterval = setInterval(function() {
                    // Saniyeleri formatla
                    var minutes = Math.floor(countdown / 60);
                    var seconds = countdown % 60;
                    var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                    // Geri sayımı güncelle
                    $('.message').text(formattedTime);
                    countdown--;

                    // Geri sayım bittiğinde
                    if (countdown < 0) {
                        clearInterval(countdownInterval); // Intervali durdur
                        $('.message').text(''); // Mesajı sıfırla
                        $('.resend_code').text('Kodu yenidən göndər'); // Bağlantı metnini eski haline getir
                        $('.resend_code').css('pointer-events', 'auto').css('color', 'blue'); // Bağlantıyı tekrar etkinleştir
                    }
                }, 1000); // Her 1000 ms'de (1 saniye) tekrar et
            });
    </script>
@endpush
