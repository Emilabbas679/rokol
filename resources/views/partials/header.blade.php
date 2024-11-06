<header class="header" id="header">
    <div class="header_top clearfix">
        <div class="main_center clearfix">
            <div class="header_left">
                <div class="logo_sect clearfix">
                    <a href="/" class="logo">
                        <div class="logo_img">
                            <img src="{{asset('img/icons/logo.svg?v2')}}" alt="Logo">
                        </div>
                    </a>
                </div>
            </div>
            <div class="header_right clearfix">

                <div class="header_row hrow_top desk_show clearfix">
                    <div class="hd_search ">
                        <form method="get" action="{!! route('products') !!}">
                            <div class="search_row clearfix">
                                <input type="text" name="q" class="search_input" value="{{ request()->get('q') }}"
                                       placeholder="@lang('Sayt üzrə axtarış')">
                                <button type="submit" class="search_btn"></button>
                            </div>
                        </form>
                    </div>
                    <div class="hd_r_icons">
                        <a href="{{route('products')}}" class="register_btn">Online sifariş</a>
                        <a href="tel:*3030" class="call_center">*3030</a>
                        <ul class="socials clearfix">
                            <li>
                                <a href="https://wa.me/+994102603030" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/wp_social.svg?v1')}}" alt="Whatsapp">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/RokolBoyalari" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/fb.svg?v1')}}" alt="Facebook">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/rokolboyalari/" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/ins.svg?v1')}}" alt="Instagram">
                                    </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/tiktok.svg?v1')}}" alt="Tiktok">
                                    </span>
                                </a>
                            </li> -->
                            <li>
                                <a href="https://www.linkedin.com/company/rokol-boyalar%C4%B1/" class="social_icon"
                                   target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/lnkd.svg?v1')}}" alt="Linkedn">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@MatanatAcompany" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/ytb.svg?v1')}}" alt="Youtube">
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="lang_sect ">
                            <div class="lang_btn" style="text-transform: capitalize">{{app()->getLocale()}}</div>
                            <ul class="langs">
                                <li @if(app()->getLocale() == 'az') class="active" @endif><a
                                            href="{{route('locale', 'az')}}">Az</a></li>
                                <li @if(app()->getLocale() == 'en') class="active" @endif><a
                                            href="{{route('locale', 'en')}}">En</a></li>
                                <li @if(app()->getLocale() == 'ru') class="active" @endif><a
                                            href="{{route('locale', 'ru')}}">Ru</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header_row clearfix">
                    <nav class="nav_desk">
                        <ul class="hdr_menu clearfix">
                            <li>
                                <a href="{!! route('about') !!}"
                                   class="{!! request()->routeIs('about') ? 'active' :  '' !!}">{{translate('header_about')}} </a>
                            </li>
                            <li>
                                <a href="{{route('products')}}"
                                   class="{!! request()->routeIs('products') ? 'active' :  '' !!}">{{translate('header_products')}}</a>

                                @php
                                    $headerCategories = menu_categories()->groupBy('category_id');
                                @endphp
                                <div class="drop_section">
                                    <ul class="drop_list">
                                        @foreach($headerCategories->first() ?? [] as $category)
                                            <li>
                                                <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                                                <div class="drop_section drop_two">
                                                    <ul class="drop_list">
                                                        @foreach($category->children as $child)
                                                            <li>
                                                                <a href="{{ route('category', $child->id) }}">{{ $child->name[app()->getLocale()] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{!! route('colors') !!}"
                                   class="{!! request()->routeIs('colors') ? 'active' :  '' !!}">{{translate('header_colors')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('offers.index') !!}" class="">{{translate('header_offers')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('news.index') !!}"
                                   class="{!! request()->routeIs('news.*') ? 'active' : '' !!}">{{translate('header_news')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('catalogs.index') !!}" target="_blank"
                                   class="">{{translate('header_catalogs')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('contact') !!}"
                                   class="{!! request()->routeIs('contact') ? 'active' :  '' !!}">{{translate('header_contact')}} </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="hd_r_icons">
                        <div class="seacrh_mobile_icon"></div>
                        <ul class="shop_icons_list">
                            @include('partials.cart_icon')
                            @include('partials.fav_icon')
                            <li>
                                <a href="javascript:void(0)" class="shop_icon icon_calc open_calc"></a>
                            </li>
                        </ul>
                        <div class="modal calculator_modal" id="calculatorModal" data-id="calculatorModal">
                            <div class="modal_section" style="overflow: visible;">
                                <div class="modal_container" style="overflow: visible;">
                                    <div class="modal_header">
                                        <h5 class="modal_title">Kalkulyator</h5>
                                        <span class="close_modal"></span>
                                    </div>
                                    <div class="modal_body">
                                        <div class="select_item" style="width: 100%">
                                            <div id="{!! isset($calcProduct) && !is_null($calcProduct->consumption_norm) ? 'hiddenDiv' : '' !!}" class="select-section">
                                                <div class="form_item">
                                                    <select name="parent_category_id" class="js-example-basic-single "
                                                            id="products_main_calc" data-placeholder="">
                                                        <option selected disabled value="0">Məhsul sistemi</option>
                                                        @foreach(menu_categories() as $cat)
                                                            <option value="{!! $cat->id !!}">{!! $cat->name[app()->getLocale()] !!}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="customDrop customDrop-main_calc"></span>
                                                </div>
                                                <div class="form_item">
                                                    <select name="category_id" class="js-example-basic-single "
                                                            id="products_other_calc"
                                                            data-placeholder="">
                                                        <option selected disabled value="0">Məhsul qrupu</option>
                                                    </select>
                                                    <span class="customDrop customDrop-other_calc"></span>
                                                </div>
                                                <div class="form_item">
                                                    <select name="product_id" class="js-example-basic-single "
                                                            id="this_product"
                                                            data-placeholder="">
                                                        <option selected disabled value="0">Məhsul</option>
                                                    </select>
                                                    <span class="customDrop customDrop-this_calc"></span>
                                                </div>
                                            </div>
                                            <div id="{!! isset($calcProduct) && !is_null($calcProduct->consumption_norm) ? '' : 'hiddenDiv' !!}" class="input-section">
                                                <div class="calc_inputs">
                                                    <div class="form_item">
                                                        <label for="">Səthin eni (m):</label>
                                                        <input type="text" id="width" name="email"
                                                               placeholder="Səthin eni (m):" value=""
                                                               class="item_input">
                                                    </div>
                                                    <div class="form_item">
                                                        <label for="">Səthin uzunluğu (m):</label>
                                                        <input type="text" name="email" id="length"
                                                               placeholder="Səthin uzunluğu (m):" value=""
                                                               class="item_input">
                                                    </div>
                                                    <div class="form_item">
                                                        <label for="">Tövsiyyə olunan qatın sayı:</label>
                                                        <input type="text" name="email" id="layers"
                                                               placeholder="Tövsiyyə olunan qatın sayı" value="{!! isset($calcProduct) && !is_null($calcProduct->recommended_layers) ? $calcProduct->recommended_layers : '' !!}"
                                                               class="item_input">
                                                    </div>
                                                    <div class="form_item disable_input">
                                                        <label for="">Sərfiyyat norması (kq/kv.m):</label>
                                                        <input disabled type="text" name="email" id="consumption"
                                                               placeholder="sərfiyyat norması (kq/kv.m):"
                                                               value="{!! isset($calcProduct) && !is_null($calcProduct->consumption_norm) ? $calcProduct->consumption_norm : '' !!}" class="item_input">
                                                    </div>
                                                    <div class="form_item">
                                                        <button type="submit" class="btn_sign submit_btn"
                                                                id="calculateBtn">Hesabla
                                                        </button>
                                                    </div>
                                                    <div class="modal answer_modal">
                                                        <div class="modal_section" style="overflow: visible;">
                                                            <div class="modal_container" style="overflow: visible;">
                                                                <div class="modal_header">
                                                                    <h5 class="modal_title">Hesablama nəticəsi</h5>
                                                                    <span class="close_modal"></span>
                                                                </div>
                                                                <div class="modal_body">
                                                                    <p>
                                                                        <strong>Hesablama nəticəsi: </strong>
                                                                        <span id="result">
                
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prof_items_sect">
                        @guest()
                            <a href="{!! route('login') !!}" class="login_btn">
                                <span>
                                    @lang('Giriş')
                                </span>
                            </a>
                        @else
                            <div class="login_profile"><span>{!! fUser()->full_name !!}</span></div>
                            <div class="prof_drop clearfix">
                                <div class="profile_setting clearfix">
                                    <ul class="profile_list clearfix">
                                        <li class="prof_icon icon_prof">
                                            <a href="{!! route('settings.edit') !!}" class="clearfix">
                                                <span class="prof_icon_name">{!! fUser()->full_name !!} </span>
                                            </a>
                                        </li>
                                        <li class="prof_icon">
                                            <a href="{!! route('orders.index') !!}" class="clearfix">
                                                <span class="prof_icon_name">@lang('Sifarişlərim')</span>
                                            </a>
                                        </li>
                                        <li class="prof_icon">
                                            <a href="{!! route('favorites.index') !!}" class="clearfix">
                                                <span class="prof_icon_name">@lang('Seçilmişlərim')</span>
                                            </a>
                                        </li>
                                        <li class="prof_icon">
                                            <a href="{!! route('addresses.index') !!}" class="clearfix">
                                                <span class="prof_icon_name">@lang('Ünvanlarım')</span>
                                            </a>
                                        </li>
                                        <li class="prof_icon">
                                            <a href="{!! route('settings.edit') !!}" class="clearfix">
                                                <span class="prof_icon_name">@lang('Şəxsi məlumatlarım')</span>
                                            </a>
                                        </li>
                                        <li class="prof_icon icon_exit">
                                            <form action="{!! route('logout') !!}" method="post">
                                                @csrf
                                                <button class="clearfix">
                                                    <span class="prof_icon_name">@lang('Çıxış')</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </div>
                    <div class="menu_btn open"></div>

                    <div class="hd_search mobile_search_sect">
                        <form method="post" action="{!! route('products') !!}">
                            <div class="search_row clearfix">
                                <input type="text" name="q" class="search_input" value="{{ request()->get('q') }}"
                                       placeholder="@lang('Sayt üzrə axtarış')">
                                <button type="submit" class="search_btn"></button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <nav class="nav_mobile">
        <div class="menu_btn close"></div>
        <div class="mob_header">
            <!-- <ul class="langs">
                <li @if(app()->getLocale() == 'az')
                class="active"




            @endif><a href="{{route('locale', 'az')}}">Az</a>
                </li>
                <li @if(app()->getLocale() == 'en')
                class="active"




            @endif><a href="{{route('locale', 'en')}}">En</a>
                </li>
                <li @if(app()->getLocale() == 'ru')
                class="active"




            @endif><a href="{{route('locale', 'ru')}}">Ru</a>
                </li>
            </ul> -->
            <a href="{{route('products')}}" class="register_btn">Online sifariş</a>
            <a href="tel:*3030" class="call_center">*3030</a>
        </div>
        <div class="mob_body">
            <ul class="hdr_menu clearfix">
                <li>
                    <a href="{!! route('about') !!}" class="">{{translate('header_about')}} </a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_products')}}</a>
                    <ul>
                        @foreach($headerCategories->first() ?? [] as $category)
                            <li>
                                <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                                <ul>
                                    @foreach($category->children as $child)
                                        <li>
                                            <a href="{{route('category', $child->id)}}">{{$child->name[app()->getLocale()]}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a href="{!! route('colors') !!}"
                       class="{!! request()->routeIs('colors') ? 'active' :  '' !!}">{{translate('header_colors')}} </a>
                </li>
                <li>
                    <a href="{!! route('offers.index') !!}" class="active">{{translate('header_offers')}} </a>
                </li>
                <li>
                    <a href="{!! route('news.index') !!}"
                       class="{!! request()->routeIs('news.*') ? 'active' : '' !!}">{{translate('header_news')}} </a>
                </li>
                <li>
                    <a href="{!! route('catalogs.index') !!}" class="">{{translate('header_catalogs')}} </a>
                </li>
                <li>
                    <a href="{!! route('contact') !!}"
                       class="{!! request()->routeIs('contact') ? 'active' :  '' !!}">{{translate('header_contact')}} </a>
                </li>
            </ul>
        </div>
        <div class="mob_ftr">
            <ul class="socials clearfix">
                <li>
                    <a href="https://wa.me/+994102603030" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/wp_social.svg?v1')}}" alt="Whatsapp">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/RokolBoyalari" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/fb.svg?v1')}}" alt="Facebook">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/rokolboyalari/" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/ins.svg?v1')}}" alt="Instagram">
                        </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/tiktok.svg?v1')}}" alt="Tiktok">
                        </span>
                    </a>
                </li> -->
                <li>
                    <a href="https://www.linkedin.com/company/rokol-boyalar%C4%B1/" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/lnkd.svg?v1')}}" alt="Linkedn">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@MatanatAcompany" class="social_icon" target="_blank">
                        <span class="scl_icn">
                            <img src="{{asset('img/icons/ytb.svg?v1')}}" alt="Youtube">
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
@push('js')
    <script>
        $(document).ready(function () {
            $('#calculateBtn').click(function (event) {
                $(".answer_modal").addClass("opened")
                event.preventDefault();

                $('#result').text('');

                var width = $('#width').val().trim();
                var length = $('#length').val().trim();
                var layers = $('#layers').val().trim();
                var consumption = $('#consumption').val().trim();

                var errors = [];

                if (width === "" || isNaN(width) || parseFloat(width) <= 0) {
                    errors.push("Səthin eni düzgün daxil edilməyib.");
                }

                if (length === "" || isNaN(length) || parseFloat(length) <= 0) {
                    errors.push("Səthin uzunluğu düzgün daxil edilməyib.");
                }

                if (layers === "" || isNaN(layers) || parseFloat(layers) <= 0) {
                    errors.push("Qat sayı düzgün daxil edilməyib.");
                }

                if (errors.length > 0) {
                    $('#result').html(errors.join("<br>"));
                    return;
                }

                width = parseFloat(width);
                length = parseFloat(length);
                layers = parseFloat(layers);
                consumption = parseFloat(consumption);

                var adjustedConsumption = parseFloat((1 / consumption).toFixed(3));
                var result = width * length * layers * adjustedConsumption;

                $('#result').text(result.toFixed(2) + "kq");
            });
        });

        $(".new-price").each(function () {
            if ($(this).parent().find("span").hasClass("old-price")) {
                $(this).parent().addClass("sales");
                console.log(this);
            }
        });
        $('#products_main_calc').select2({
            minimumResultsForSearch: Infinity,
            dropdownParent: $('.customDrop-main_calc'),
        });
        $('#products_other_calc').select2({
            minimumResultsForSearch: Infinity,
            dropdownParent: $('.customDrop-other_calc'),
        });
        $('#this_product').select2({
            minimumResultsForSearch: Infinity,
            dropdownParent: $('.customDrop-this_calc'),
        });
        $('.favotites').click(function () {
            if ($('#dynamic-message').length) {
                $('#dynamic-message').stop(true, true).remove();
            }
            let message = '';
            if ($(this).hasClass('dologin')) {
                window.location.href = '/login';
            } else if ($(this).hasClass('dofav')) {
                message = "<?php echo translate( 'remove_fav' ); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            } else {
                message = "<?php echo translate( 'add_fav' ); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function () {
                $(this).remove();
            });

        });
        $(".open_calc").click(function () {
            let consumptionNorm = $(this).data('consumptionNorm');
            $('.select-section').css('display', 'block');
            $('.input-section').css('display', 'none');
            if (consumptionNorm) {
                consumptionNorm = parseFloat($(this).data('consumptionNorm'));
                if (consumptionNorm > 0) {
                    $('.select-section').css('display', 'none');
                    $('.input-section').css('display', 'block');
                    $('#consumption').val(consumptionNorm)
                }
                $(".calculator_modal").addClass("opened")
            } else {
                $(".calculator_modal").addClass("opened")
            }
        })

        $('.detail_basket_btn ').click(function () {
            if ($('#dynamic-message').length) {
                $('#dynamic-message').stop(true, true).remove();
            }
            if ($(this).hasClass('dologin')) {
                window.location.href = '/login';
            } else {
                 $(".btn_basket").addClass("added")
                setTimeout(function () {
                    $(".btn_basket").removeClass("added")
                }, 2000)
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function () {
                $(this).remove();
            });

        });
        $('.btn_fav').click(function () {
            if ($('#dynamic-message').length) {
                $('#dynamic-message').stop(true, true).remove();
            }
            let message = '';

            if ($(this).parent().find(".btn_basket").hasClass('dologin')) {
                window.location.href = '/login';
            } else if ($(this).hasClass('dofav')) {
                message = "<?php echo translate( 'remove_fav' ); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            } else {
                message = "<?php echo translate( 'add_fav' ); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function () {
                $(this).remove();
            });

        });
    </script>

    <script>
        let children = @json(menu_categories()->pluck('children')->flatten()->groupBy('category_id'));

        $('select[name="parent_category_id"]').on('change', function () {
            let parentId = this.value;

            $('select[name="category_id"]').html(
                ['<option selected disabled value="0">Məhsul qrupu</option>'].concat(children[parentId].map((child) => `<option value="${child.id}">${child.name.{{app()->getLocale()}}}</option>`))
            )
            $('select[name="product_id"]').html('<option selected disabled value="0">Məhsul</option>');
            $('.input-section').css('display', 'none');
        });

        $('select[name="category_id"]').on('change', function () {
            let categoryId = this.value;
            $('.input-section').css('display', 'none');
            $.ajax({
                url: '{!! url('getProductsByCategoryId') !!}/' + categoryId,
                method: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    $('select[name="product_id"]').html(
                        ['<option selected disabled value="0">Məhsul</option>'].concat(response.data.map((product) => `<option value="${product.id}">${product.name.{{app()->getLocale()}}}</option>`))
                    );
                }
            });
        });

        $('select[name="product_id"]').on('change', function () {
            let productId = this.value;
            $('.input-section').css('display', 'none');
            $.ajax({
                url: '{!! url('getConsumptionByProductId') !!}/' + productId,
                method: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    if (response.data.consumption_norm > 0) {
                        $('.input-section').css('display', 'block');
                        $('#consumption').val(response.data.consumption_norm);
                        $('#layers').val(response.data.recommended_layers);
                    }
                }
            });
        });





    </script>
    <!--Start of Tawk.to Script-->
    {{--    <script type="text/javascript">--}}
    {{--        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
    {{--            (function(){--}}
    {{--            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
    {{--            s1.async=true;--}}
    {{--            s1.src='https://embed.tawk.to/6709014d4304e3196ad01b38/1i9tjo436';--}}
    {{--            s1.charset='UTF-8';--}}
    {{--            s1.setAttribute('crossorigin','*');--}}
    {{--            s0.parentNode.insertBefore(s1,s0);--}}
    {{--        })();--}}
    {{--        --}}
    {{--    </script>--}}
    <!--End of Tawk.to Script-->
@endpush
