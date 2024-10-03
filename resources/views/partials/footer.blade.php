<footer>
    <div class="footer_full clearfix">
        <div class="main_center clearfix">
            <div class="ftr_top clearfix">

                <div class="ftr_left">
                    <div class="logo_sect clearfix">
                        <a href="/" class="logo">
                            <div class="logo_img">
                                <img src="{{asset('img/icons/logo.svg')}}" alt="Logo" >
                            </div>
                        </a>
                    </div>
                    <!-- <ul class="footer_menu">
                        <li>
                            <a href="" class="">Baş oﬁs </a>
                        </li>
                        <li>
                            <a href="" class="">Fabrik ünvanı</a>
                        </li>
                    </ul> -->
                </div>
                <div class="ftr_right">

                    <div class="ftr_menu_sect">
                        <ul class="footer_menu">
                            <li>
                                <span class="fm_hd">Menular </span>
                            </li>
                            <li>
                                <a href="{!! route('about') !!}" class="">{{translate('header_about')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('products') !!}" class="">{{translate('header_products')}}</a>
                            </li>
                            <li>
                                <a href="{!! route('catalogs') !!}" class="">{{translate('header_colors')}} </a>
                            </li>
                            <li>
                                <a href="" class="">{{translate('header_offers')}} </a>
                            </li>
                            <li>
                                <a href="{!! route('news.index') !!}" class="">{{translate('header_news')}} </a>
                            </li>
                            <!-- <li>
                                <a href="" class="">{{translate('header_catalogs')}} </a>
                            </li> -->
                            <li>
                                <a href="{!! route('contact') !!}" class="">{{translate('header_contact')}} </a>
                            </li>
                        </ul>
                        <ul class="footer_menu">
                            <li>
                                <span class="fm_hd">Kateqoriyalar </span>
                            </li>

                            @foreach(menu_categories() as $item)
                            <li>
                                <a href="{{route('category', $item->id)}}" class="">{{$item->name[app()->getLocale()] ?? ''}} </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="address_sect">
                        <div class="ftr_social">
                            <div class="adrs_row">
                                <a href="tel:*3030" class="call_center"><sup>*</sup>3030</a>
                                <div class="copyrite_text">
                                    Bakı-Sumqayıt yolu, 13,5 km AZ0123 Bakı, Azərbaycan
                                </div>
                            </div>
                            <div class="adrs_row">
                                <div>
                                    <div class="adrs_head">
                                        Sosial şəbəkələrimiz:                                    
                                    </div>
                                    <ul class="socials ftr_desk">
                                        <li>
                                            <a href="https://www.facebook.com/RokolBoyalari" class="social_icon" target="_blank">
                                                <span class="scl_icn">
                                                    <img src="https://rokol.ain.az/img/icons/fb_w.svg?v1" alt="Facebook">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/rokolboyalari/" class="social_icon" target="_blank">
                                                <span class="scl_icn">
                                                    <img src="https://rokol.ain.az/img/icons/ins_w.svg?v1" alt="Instagram">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/rokol-boyalar%C4%B1/" class="social_icon" target="_blank">
                                                <span class="scl_icn">
                                                    <img src="https://rokol.ain.az/img/icons/lnkd_w.svg?v1" alt="Linkedn">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/@MatanatAcompany" class="social_icon" target="_blank">
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
                            <div class="adrs_row">
                                <div>
                                    <div class="adrs_head">E-poçt:</div>
                                    <a href="mailto:info@rokol.az" class="call_center_mail"><span>info@</span>rokol.az</a>
                                </div>
                            </div>
                        </div>
                        <div class="copyrite">
                            <div class="copyrite_inner">{{translate('footer_copyrite')}}</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
