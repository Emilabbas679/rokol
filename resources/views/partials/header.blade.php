<header class="header" id="header">
    <div class="header_top clearfix">
        <div class="main_center clearfix">
            <div class="header_left">
                <div class="logo_sect clearfix">
                    <a href="/" class="logo">
                        <div class="logo_img">
                            <img src="{{asset('img/icons/logo.svg?v2')}}" alt="Logo" >
                        </div>
                    </a>
                </div>
            </div>
            <div class="header_right clearfix">

                <div class="header_row hrow_top clearfix">
                    <div class="hd_search">
                        <form method="post" action="#">
                            <div class="search_row clearfix">
                                <input type="text" name="query" class="search_input" value="" placeholder="Sayt üzrə axtarış">
                                <button type="submit" class="search_btn"></button>
                            </div>
                        </form>
                    </div>
                    <div class="hd_r_icons">
                        <!-- <a href="" class="repairer"></a> -->
                        <a href="" class="register_btn">Online sifariş</a>
                        <a href="tel:*3030" class="call_center">*3030</a>
                        <ul class="socials clearfix">
                            <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/fb.svg?v1')}}" alt="Facebook">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/ins.svg?v1')}}" alt="Instagram">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/tiktok.svg?v1')}}" alt="Tiktok">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/lnkd.svg?v1')}}" alt="Linkedn">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social_icon" target="_blank">
                                    <span class="scl_icn">
                                        <img src="{{asset('img/icons/ytb.svg?v1')}}" alt="Youtube">
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="lang_sect desk">
                            <div class="lang_btn" style="text-transform: capitalize">{{app()->getLocale()}}</div>
                            <ul class="langs">
                                <li @if(app()->getLocale() == 'az') class="active" @endif><a href="{{route('locale', 'az')}}">Az</a> </li>
                                <li @if(app()->getLocale() == 'en') class="active" @endif><a href="{{route('locale', 'en')}}">En</a></li>
                                <li @if(app()->getLocale() == 'ru') class="active" @endif><a href="{{route('locale', 'ru')}}">Ru</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header_row clearfix">
                    <nav class="nav_desk">
                        <ul class="hdr_menu clearfix">
                            <li>
                                <a href="" class="">{{translate('header_about')}} </a>
                            </li>
                            <li>
                                <a href="{{route('products')}}" class="">{{translate('header_products')}}</a>

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
                                <a href="" class="">{{translate('header_colors')}} </a>
                            </li>
                            <li>
                                <a href="" class="active">{{translate('header_offers')}} </a>
                            </li>
                            <li>
                                <a href="" class="">{{translate('header_news')}} </a>
                            </li>
                            <li>
                                <a href="" class="">{{translate('header_catalogs')}} </a>
                            </li>
                            <li>
                                <a href="" class="">{{translate('header_contact')}} </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="hd_r_icons">
                        <ul class="shop_icons_list">
                            <li>
                                <a href="" class="shop_icon icon_backet"></a>
                            </li>
                            <li>
                                <a href="" class="shop_icon icon_fav"></a>
                            </li>
                            <li>
                                <a href="" class="shop_icon icon_calc"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="prof_items_sect">
                        <!-- <a href="#" class="login_btn">Giriş</a> -->
                        <div class="login_profile">Azizxan</div>
                        <div class="prof_drop clearfix">
                            <div class="profile_setting clearfix">
                                <ul class="profile_list clearfix">
                                    <li class="prof_icon icon_prof">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Azizxan Sadiyev </span>
                                        </a>
                                    </li>
                                    <li class="prof_icon">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Sifarişlərim</span>
                                        </a>
                                    </li>
                                    <li class="prof_icon">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Seçilmişlərim</span>
                                        </a>
                                    </li>
                                    <li class="prof_icon">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Ünvanlarım</span>
                                        </a>
                                    </li>
                                    <li class="prof_icon">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Şəxsi məlumatlarım </span>
                                        </a>
                                    </li>
                                    <li class="prof_icon icon_exit">
                                        <a href="#" class="clearfix">
                                            <span class="prof_icon_name">Çıxış</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu_btn open"></div>

                </div>

            </div>
        </div>
    </div>
    <nav class="nav_mobile">
        <div class="menu_btn close"></div>
        <div class="mob_body">
            <ul class="hdr_menu clearfix">
                <li>
                    <a href="" class="">{{translate('header_about')}} </a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_products')}}</a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_colors')}} </a>
                </li>
                <li>
                    <a href="" class="active">{{translate('header_offers')}} </a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_news')}} </a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_catalogs')}} </a>
                </li>
                <li>
                    <a href="" class="">{{translate('header_contact')}} </a>
                </li>
            </ul>
        </div>
        <div class="mob_ftr">
            <a href="tel:+994507342371" class="number_links ">
                +994 50 734 23 71
            </a>
            <a href="" class="sing_links ">
                Bizə yazın!
            </a>
        </div>
    </nav>
</header>