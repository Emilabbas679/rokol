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
                                    $header_categories = menu_categories();
                                    $totalItems = $header_categories->count();
                                    $half = ceil($totalItems / 2);
                                    $firstHalfCategories = $header_categories->slice(0, $half);
                                    $secondHalfCategories = $header_categories->slice($half);

                                @endphp
                                <div class="drop_section">
                                    <div class="drop_row">
                                        <div class="drop_col">
                                            <ul class="drop_list">

                                                @foreach($firstHalfCategories as $category)
                                                    <li>
                                                        <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="drop_col">
                                            <ul class="drop_list">

                                                @foreach($secondHalfCategories as $category)
                                                    <li>
                                                        <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <a href="{!! route('colors') !!}" class="{!! request()->routeIs('colors') ? 'active' :  '' !!}">{{translate('header_colors')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('offers.index') !!}" class="">{{translate('header_offers')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('news.index') !!}"
                                   class="{!! request()->routeIs('news.*') ? 'active' : '' !!}">{{translate('header_news')}} </a>
                            </li>
                            <li>
                                <a  href="{!! route('catalogs.index') !!}" target="_blank" class="">{{translate('header_catalogs')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('contact') !!}" class="{!! request()->routeIs('contact') ? 'active' :  '' !!}">{{translate('header_contact')}} </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="hd_r_icons">
                        <div class="seacrh_mobile_icon"></div>
                        <ul class="shop_icons_list">
                            @include('partials.cart_icon')
                            @auth()
                                <li class="desk_show">
                                    <a href="{!! route('favorites.index') !!}" class="shop_icon icon_fav"></a>
                                </li>
                            @endauth
                            <li>
                                <a href="" class="shop_icon icon_calc"></a>
                            </li>
                        </ul>
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
                                            <a href="" class="clearfix">
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
                <li @if(app()->getLocale() == 'az') class="active" @endif><a href="{{route('locale', 'az')}}">Az</a>
                </li>
                <li @if(app()->getLocale() == 'en') class="active" @endif><a href="{{route('locale', 'en')}}">En</a>
                </li>
                <li @if(app()->getLocale() == 'ru') class="active" @endif><a href="{{route('locale', 'ru')}}">Ru</a>
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
                        @foreach($firstHalfCategories as $category)
                            <li>
                                <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                            </li>
                        @endforeach
                        @foreach($secondHalfCategories as $category)
                            <li>
                                <a href="{{route('category', $category->id)}}">{{$category->name[app()->getLocale()]}}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a href="{!! route('colors') !!}" class="{!! request()->routeIs('colors') ? 'active' :  '' !!}">{{translate('header_colors')}} </a>
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
                    <a href="{!! route('contact') !!}" class="{!! request()->routeIs('contact') ? 'active' :  '' !!}">{{translate('header_contact')}} </a>
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
        
        $(".new-price").each(function() {
            if ($(this).parent().find("span").hasClass("old-price")) {
                $(this).parent().addClass("sales");
                console.log(this);
            }
        });
        $('.favotites').click(function () {
            if ($('#dynamic-message').length) {
                $('#dynamic-message').stop(true, true).remove();
            }
            let message = '';
            if ($(this).hasClass('dologin')) {
                window.location.href = '/login';
            } else if ($(this).hasClass('dofav')) {
                message = "<?php echo translate('remove_fav'); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            } else {
                message = "<?php echo translate('add_fav'); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function(){
                $(this).remove();
            });

        });
        $('.btn_basket ').click(function () {
            if ($('#dynamic-message').length) {
                $('#dynamic-message').stop(true, true).remove();
            }
            let message = '';
            if ($(this).hasClass('dologin')) {
                window.location.href = '/login';
            } else {
                message = "<?php echo translate('add_basket'); ?>";
                // $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
                $(".btn_basket").addClass("added")
                setTimeout(function() {
                    $(".btn_basket").removeClass("added")
                },2000)
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function(){
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
                message = "<?php echo translate('remove_fav'); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
                $(this).toggleClass("dofav");
            } else {
                message = "<?php echo translate('add_fav'); ?>";
                $('body').append('<div id="dynamic-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:10px; background-color:#006072; color:#fff; border-radius:5px; z-index:9999;">' + message + '</div>');
                $(this).toggleClass("dofav");
            }


            $('#dynamic-message').fadeIn(500).delay(3000).fadeOut(500, function(){
                $(this).remove();
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
