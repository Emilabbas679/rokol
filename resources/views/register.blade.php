@extends('layout')
@section('title', translate('register'))
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
                <form action="{!! route('register') !!}" method="post" id="register_form">
                    @csrf
                    <div class="form_item ">
                        <input type="text" name="full_name" placeholder="@lang('Ad, Soyad *')" class="item_input"
                               required>
                        @error('full_name')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item ">
                        <input type="text" name="phone" placeholder="@lang('Telefon nömrəsi (+994)')"
                               class="item_input phone" value="994" required>
                        @error('phone')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item ">
                        <input type="text" name="email" placeholder="@lang('E-poçt ünvanı (zəruri deyil)')" class="item_input"
                               >
                        @error('email')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_item">
                        <input type="password" name="password" placeholder="@lang('Şifrə *')" class="item_input "
                               required>
                        @error('password')
                        <div class="error_type">{{ $message }}</div>
                        @enderror
                        <div class="pass_eye">
							<span class="password-showhide">
								<span class="show-password"></span>
								<span class="hide-password"></span>
							</span>
                        </div>
                    </div>
                    <div class="form_item">
                        <input type="password" name="password_confirmation" placeholder="@lang('Şifrə təkrar *')"
                               class="item_input ">
                        <!-- <div class="error_type">Supporting text</div> -->
                        <div class="pass_eye">
							<span class="password-showhide">
								<span class="show-password"></span>
								<span class="hide-password"></span>
							</span>
                        </div>
                    </div>
                    <div class="security_content">
                        Siz davam et düyməsini sıxmaqla <a href="javascrivt:void(0)" style="text-decoration:underline;">Məxfilik
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
    <div class="modal reg_modal" id="code_modal" data-id="code_modal">
        <div class="modal_section">
            <div class="modal_container phone_modal">
                <div class="modal_header">
                    <h5 class="modal_title">Təsdiqlə</h5>
                    <span class="close_modal"></span>
                </div>
                <div class="modal_body">
                    <form id="code_form">
                        <div class="security_content">
                            <span class="phone_number">+994 55 *** ** 20</span>
                            @lang('nömrəsinə SMS kod göndərildi')
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

                        <div class="error_type" id="code_error" style="display:none">Kod düzgün daxil edilməyib</div>
                        <button type="submit" class="btn_sign submit_btn submit_code">@lang('Göndər')</button>

                        <a href="javascript:void(0)"
                           class="security_content modal_little_content modal_centered resend_code">
                            Kodu yenidən göndər
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

    <div class="modal" id="privacy_modal" data-id="privacy_modal">
        <div class="modal_section">
            <div class="modal_container privacy_modal">
                <div class="modal_header">
                    <h5 class="modal_title">Məxfilik Siyasəti</h5>
                    <span class="close_modal"></span>
                </div>
                <div class="modal_body modal_text">
                    <p>
                        “Mətanət-A” Şirkəti (rokol.az saytı) tərəfdaşlarının, müştərilərinin, həmçinin vebsayt vasitəsilə məlumatlarını təqdim edən istifadəçilərin məxfiliyinin qorunmasına dair öhdəlik daşıyır.
                        “Mətanət-A” Şirkətinin biznes prosesləri və şirkət fəaliyyəti əsasən müvafiq ISO standartlarına ISO 9001:2015 İdarəetmə sistemi və “Fərdi məlumatlar haqqında” Azərbaycan Respublikasının Qanununa uyğun həyata keçirilir.
                        Bu Məxfilik Siyasətini diqqətlə oxuyun və edilə biləcək hər hansı dəyişiklikləri nəzərdən keçirmək üçün vaxtaşırı səhifəyə yenidən daxil olun. 
                        MƏLUMATLARIN TOPLANILMASI VƏ İSTİFADƏSİ
                        “Rokol.az” saytı istifadəçinin könüllü olaraq “rokol.az” vebsaytına ötürdüyü, aşağıdakı qeyd edilən məlumatları toplaya bilər:
                    </p>
                    <ul>
                        <li>İstifadəçinin adı</li>
                        <li>İstifadəçinin soyadı</li>
                        <li>Əlaqə nömrəsi</li>
                        <li>Elektron poçt ünvanı</li>
                    </ul>
                    <p>

                        Toplanılan məlumatlar yalnız bu Məxfilik Siyasətində müəyyən edilən hallarda toplana bilər. Həmin hallar aşağıdakılardır:
                    </p>
                    <ul>
                        <li>
                            Vebsayt vasitəsilə “rokol.az” saytına sorğu göndərərkən
                        </li>
                    </ul>
                    <p>
                        Toplanan məlumatlar aşağıdakı məqsədlər üçün istifadə oluna bilər:
                    </p>
                    <ul>
                        <li>İstifadəçinin sorğusuna cavab hazırlayan zaman</li>
                        <li>Bazar araşdırması, analitik məqalələr hazırlanarkən, həmçinin, proses, xidmət və məhsulların təkmilləşdirilməsi üçün</li>
                        <li>Tədbirlərimiz, xidmətlərimiz, məhsullarımız və yeniliklərimiz barədə məlumat vermək üçün</li>
                    </ul>	
                    <p>
                        İstifadəçi hər zaman gələcəkdə oxşar məlumatlar almaqdan imtina edə və ya bütün fərdi məlumatlarının silinməsinə dair sorğu göndərə bilər.
                        İstifadəçilərin “rokol.az” saytında saxlanılan məlumatları onların razılığı olmadan satıla və ya üçüncü şəxslə paylaşıla bilməz.
                        “COOKİE” SİYASƏTİ
                    </p>
                    <p>
                        Kukilər kompüteriniz, planşetiniz və ya mobil telefonunuzda saxlanılan kiçik mətn fayllarıdır. Bu fayllarda sizin IP adresiniz, istifadə olunan brauzer proqramının növü, saytdan istifadənin tarixi və müddəti, saytın istifadə etdiyiniz bölmələri və sairə haqqında məlumatlar saxlanılır. “rokol.az” bir çox veb saytlarda olduğu kimi veb sayt istifadəçiləri üçün xidmət səviyyəsinin artırılması məqsədilə kukilərdən və digər texnologiyalardan faydalanır.
                    </p>
                    <p>
                        Kukilərdən istifadə olunmasını qəbul etmirsinizsə, veb saytı tərk etməli və ya kuki seçimlərinizi hazırkı Məxfilik Siyasətində göstərilən qaydada dəyişdirməlisiniz. Kukilərə icazə verilmədiyi halda veb saytdakı bəzi funksiyaların öz funksiyonallığını itirə biləcəyini nəzərə almağınızı xahiş edirik.
                        Əlavə olaraq “rokol.az” statistik məqsədlər üçün üçüncü tərəflərin kukiləri vasitəsilə məlumatı toplayır. 
                        Kukilərin istifadəsini özünüz tənzimləyə bilərsiniz. Belə ki, brauzerinizin tənzimləmələri vasitəsilə kukilərin deaktiv edilməsini və ya əvvəlcədən razılığınız olmadığı halda kompüterinizdə, mobil cihazınızda saxlanılmamasını təmin edə bilərsiniz. Kukiləri qəbul etmədiyiniz halda, azintelecom.az veb saytını daha effektiv edən bir çox xüsusiyyətləri istifadə edə bilməyəcəksiniz və bəzi xidmətlərimiz tam işləməyəcək.
                        MƏLUMATLARIN QORUNMASI
                    </p>
                    <p>
                        “rokol.az” sizin məlumatlarınızı qorumaq üçün çalışır. Bunun üçün biz müxtəlif təhlükəsizlik texnologiyalarından və informasiyanın icazəsiz girişdən, istifadədən və ya açıqlanmasından qorunmasına yönələn tədbirlər həyata keçiririk. İstifadə etdiyimiz tədbirlər sizin məlumatlarınızın emalı riskinə uyğun təhlükəsizlik səviyyəsini təmin etmək üçün nəzərdə tutulub.
                        “rokol.az” öz qəsdi və ya kobud səhvindən yaranan birbaşa zərərlər istisna olmaqla, veb saytın istifadəsi nəticəsində meydana gələ biləcək birbaşa və ya dolayı zərərə görə heç bir halda məsuliyyət daşımır.
                        Bu məxfilik siyasəti ilə bağlı, həmçinin rokol.az saytının fəaliyyəti ilə bağlı aşağıdakı əlaqə vasitələrindən bizə müraciət edə bilərsiniz:
                        Ünvan: Azərbaycan, Abşeron, Masazır-2, AZ0123
                        E-mail: info@matanata.com
                        Telefon: +994 10 260 30 30
                        *3030
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

<script>
        $(document).ready(function () {
            $(".phone").inputmask({
                mask: "+(999) 99 999 99 99",
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
        $(".security_content a").click(function(){
            $("#privacy_modal").addClass("opened")
        })

        function sendCode(isFirst) {
            let phoneNumber = $('input[name="phone"]').val().replaceAll(/\(|\)|_/gi, '');
            let data = $('#register_form').serialize();
            let validationNumber = phoneNumber.replaceAll(' ', '');
            if (validationNumber.trim() !== '' && validationNumber.length === 13) {
                $.ajax({
                    url: '{!! route('phone.send_code') !!}',
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data,
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
            e.preventDefault();
            sendCode(true);
        })
        $(".submit_code").click(function (e) {
            e.preventDefault();
            $('#code_error').css('display', 'none');
            let code = $('#code_form').serialize();
            let data = $('#register_form').serialize();
            data = `${data}&${code}`;
            $.ajax({
                url: '{!! route('phone.verify') !!}',
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.status === 'success') {
                        registerUser();
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

        function registerUser() {
            let data = $('#register_form').serialize();
            $.ajax({
                url: '{!! route('register') !!}',
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.status === 'success') {
                        $("#code_form").removeClass("opened");
                        window.location.href = "{!! route('login') !!}"
                    }
                },
            });
        }

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
