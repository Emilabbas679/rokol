@extends('layout')
@section('title', translate('home'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Main Slider -->
    <div class="section_wrap wrap_slider wrap_main_slider main_slider">
        <div class="sect_body slider_container clearfix">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="swiper-link clearfix">
                                <div class="col_in">
                                    <div class="item_img">
                                        <img src="{{asset('storage/'.$slider->image)}}" alt="Main slider Image">
                                    </div>
                                    <div class="main_slider_content">
                                        <div class="main_center clearfix">
                                            <div class="main_slider_inner clearfix">
                                                <h4 class="itm_title">
                                                    {{ $slider->header[app()->getLocale()] }}
                                                </h4>
                                                <p class="itm_info">
                                                    {{ $slider->content[app()->getLocale()] }}
                                                </p>
                                                <!-- <div class="go_product">
                                                    <a href="{{ $slider->url }}">@lang('Ətraflı')</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper_pagin_items">
                <div class="swiper-pagination"></div>
            </div>
            <!-- Add Arrows -->
            @if($sliders->count() - 1)
                <div class="swiper_arrows clearfix">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            @endif
        </div>
    </div>
    <!-- Main Slider -->



    <!-- Prodcts section -->
    <div class="section_wrap wrap_advantage product_items wrap_slider">
        <div class="main_center clearfix">
            <div class="sect_body slider_container clearfix">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <a href="./category/3" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product1.png')}}" alt="Daxili boyalar">
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Daxili boyalar</h5>
                                        <p class="itm_info">
                                            Akrilik sopolimer əsaslı, yüksək örtücülük qabliyyətinə malik, ətraf mühit üçün zərərsiz və qoxusuz daxili səth boyalarıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="./category/1" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/boyadolgu.jpg')}}" alt="Boya, Dolğu və Iaklar">
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Boya, Dolğu və Iaklar</h5>
                                        <p class="itm_info">
                                            Uretan alkid əsaslı, bütün növ ağac məmulatlarının səthlərinin qorunmasını təmin edən məhsullardır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="./category/5" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/yolcizgi.jpg')}}" alt="Yol Cizgi Boyaları">
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Yol Cizgi Boyaları</h5>
                                        <p class="itm_info">
                                            Alkid və xlor kauçuk, Termoplastik akrilik qətran əsaslı, aşınmaya, sürtünməyə qarşı davamlı, avtomagistrallarda, hava limanlarında və digər beton və asfalt səthlərin işarələnməsində istifadə olunan boyalardır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="./category/2" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/sanaye.jpg')}}" alt="Sənaye boyaları">
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Sənaye boyaları</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz alkid əsaslı, birkomponentli, antikorroziv,  sənayenin bütün sahələrində, metal,ağac və beton səthlərdə istifadə olunan boyalardır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="./category/4" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product2.png')}}" alt="Fasad boyaları">
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Fasad boyaları</h5>
                                        <p class="itm_info">
                                            Akrilik soplimer əsaslı, yağışa, nəmə və digər xarici təsirlərə qarşı davamlı son qat boyalarıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper_pagin_items">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- <div class="section_wrap wrap_advantage product_items">
        <div class="main_center clearfix">
            <div class="sect_body clearfix">
                <div class="row">

                    <div class="col item_col clearfix">
                        <div class="col_in">
                            <a href="#" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product1.png')}}" alt="Daxili məkan boyaları" >
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Daxili məkan boyaları</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz əsaslı, tez quruyan,
                                            birkompo nentli, parlaq son qat metal və mebel boyasıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col item_col clearfix">
                        <div class="col_in">
                            <a href="#" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product2.png')}}" alt="Fasad Boyaları" >
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Fasad Boyaları</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz əsaslı, tez quruyan,
                                            birkompo nentli, parlaq son qat metal və mebel boyasıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col item_col clearfix">
                        <div class="col_in">
                            <a href="#" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product3.png')}}" alt="Yol Cizgi Boyaları" >
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Yol Cizgi Boyaları</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz əsaslı, tez quruyan,
                                            birkompo nentli, parlaq son qat metal və mebel boyasıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col item_col clearfix">
                        <div class="col_in">
                            <a href="#" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product1.png')}}" alt="Boya, Dolğu və Laklar" >
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Boya, Dolğu və Laklar</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz əsaslı, tez quruyan,
                                            birkompo nentli, parlaq son qat metal və mebel boyasıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col item_col clearfix">
                        <div class="col_in">
                            <a href="#" class="atg_item">
                                <div class="atg_img">
                                    <img src="{{asset('img/product2.png')}}" alt="Sənaye Boyaları" >
                                </div>
                                <div class="atg_content">
                                    <div class="row_inner">
                                        <h5 class="itm_title">Sənaye Boyaları</h5>
                                        <p class="itm_info">
                                            Nitrosellüloz əsaslı, tez quruyan,
                                            birkompo nentli, parlaq son qat metal və mebel boyasıdır.
                                        </p>
                                        <div class="go_product">
                                            <span>Məhsullara keçin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Prodcts section -->

    <!-- Colors table Part -->
    <div class="about_gallery_item">
        <div class="main_center clearfix">
            <div class="abt_left abt_h">
                <div class="abt_title">
                    RƏNGLƏR CƏDVƏLİ
                </div>
                <div class="abt_info">
                    <p>
                        Yorğun bir günün ardından evdə dinc saatlar keçirmək istərdinizmi?
                    </p>

                    <p>
                        Sizə yetər ki, Rokoldan ilham alın! Daxili boya üçün seçdiyiniz rənglərə uyğun olacaq digər
                        tonları
                        öyrənmək və onları otağınızda istifadə etmək üçün Polisanın rəng seçimlərinə nəzər salın.
                    </p>
                    <p>
                        İnteryer dizaynerlərinin tətbiq etdiyi 60-30-10 qaydasına uyğun olaraq divarlarınızda istifadə
                        etdiyiniz açıq tonlar yaşayış məkanınıza parlaq bir görünüş verəcək.
                    </p>
                    <p>
                        Bu rənglərlə birləşdirildikdə möcüzələr yaradan orta tonları əlavə etməklə sakit atmosferin
                        davamlılığını təmin edə bilərsiniz.
                    </p>
                </div>
                <div class="more_color">
                    <a href="{!! route('colors') !!}">Rəngləri kəşf et</a>
                </div>
            </div>
            <div class="abt_right abt_h">
                <div class="abt_big">
                    <img src="{{asset('img/rokol_colors.png?v1')}}" alt="rokol_colors">
                </div>
            </div>
        </div>
    </div>
    <!-- Colors table Part -->

    <!-- Full image color porpover -->
    <div class="wrap_full_color">
        <img src="{{asset('img/full_colors.png?v2')}}" alt="Fullcolor">
        <div class="item_color_hov how_1">
            <!-- <a href="https://rokol.az/product/64"> -->
                <div class="hov_item"><span>1</span></div>
                <div class="hov_content">
                    <img src="{{asset('img/h-1.png?v1')}}" alt="Emulsiya">
                    <h6 class="hov_title"></h6>
                    <p class="hov_info">Rapid Boya</p>
                </div>
            <!-- </a> -->
        </div>
        <div class="item_color_hov how_2">
            <!-- <a href="https://rokol.az/product/64"> -->
                <div class="hov_item"><span>2</span></div>
                <div class="hov_content">
                    <img src="{{asset('img/h-3.png?v1')}}" alt="Emulsiya">
                    <h6 class="hov_title"></h6>
                    <p class="hov_info">Plus Boya</p>
                </div>
            <!-- </a> -->
        </div>
        <div class="item_color_hov how_3">
            <!-- <a href="https://rokol.az/product/64"> -->
                <div class="hov_item"><span>3</span></div>
                <div class="hov_content">
                    <img src="{{asset('img/h-3.png?v1')}}" alt="Emulsiya">
                    <h6 class="hov_title"></h6>
                    <p class="hov_info">Selluzik Boya</p>
                </div>
            <!-- </a> -->
        </div>
    </div>
    <!-- Full image color porpover -->


    @if($videoNews->count())
    <div class="section_wrap wrap_advantage video_items wrap_slider  ">
        <div class="main_center clearfix">
            <div class="sect_header clearfix">
                <h2 class="sect_title">
                    <a href="">Videolar</a>
                </h2>
            </div>
            <div class="sect_body slider_container clearfix">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($videoNews as $video)
                            <div class="swiper-slide">
                                <a href="{!! route('news.show', $video) !!}" class="atg_item">
                                    <div class="atg_img">
                                        <img src="{{asset('storage/'.$video->image)}}"
                                             alt="{{ $video->title[app()->getLocale()] }}">
                                    </div>
                                    <div class="atg_content">
                                        <div class="row_inner">
                                            <h5 class="itm_title">{{ $video->title[app()->getLocale()] }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper_pagin_items">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('js')
    <script>
        $(".swiper-button-next").click(function () {
            $(this).removeClass("swp_show")
        })
        var swiper = new Swiper('.main_slider .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.main_slider .swiper-button-next',
                prevEl: '.main_slider .swiper-button-prev',
            },
            pagination: {
                el: ".main_slider .swiper-pagination",
                clickable: true,
            }
        });
        var swiper = new Swiper('.video_items .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 32,
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.video_items .swiper-button-next',
                prevEl: '.video_items .swiper-button-prev',
            },
            pagination: {
                el: ".video_items .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                560: {
                    slidesPerView: 3,
                    spaceBetween: 32,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 32,
                },
            },
        });
        var swiper = new Swiper('.product_items .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 32,
            loop: false,
            pagination: {
                el: ".product_items .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    loop: true,
                    speed: 2000,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                },
                560: {
                    slidesPerView: 3,
                    spaceBetween: 32,
                    loop: true,
                    speed: 2000,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 32,
                    loop: true,
                    speed: 2000,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                },
                1199: {
                    slidesPerView: 5,
                    spaceBetween: 32,
                },
            },
        });
    </script>
@endpush
