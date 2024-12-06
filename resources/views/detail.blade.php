@extends('layout')
@section('title', translate('detail'))
@push('meta')

@endpush

@push('css')

@endpush


@section('content')
    <div class="section_wrap wrap_product">
        <div class="main_center clearfix">
            <div class="section_wrap wrap_breadcrumb">
                <div class="breadcrumb">
                    <a href="{{route('home')}}">Əsas səhifə</a>
                    <a href="{{route('category', $product->category_id)}}">Məhsullar</a>
                    <a href="javascript:void(0)">{{$product->name}}</a>
                </div>
            </div>
            @php
                $calcProduct = $product
            @endphp
            <div class="section_wrap wrap_category wrap_detail_product">
                <div class="sect_body product_container clearfix">
                    <div class="wrap_left">
                        <div class="col_in">
                            @if($product->offer_of_week)
                                <div class="fav_sect">
                                    <div class="offer-tag">
                                        <p class="offer_val">@lang('Həftənin təklifi')</p>
                                    </div>
                                </div>
                            @endif
                            <div class="item_img">
                                <img src="{{asset('storage/'.$product->image)}}" alt="product">
                            </div>
                        </div>
                    </div>
                    <div class="wrap_right">
                        <div class="product_detail">
                            <div class="product_content_sect">
                                <div class="product_info_table">

                                    <div class="pr_tbl_left">
                                        <h1 class="product_title">{{ $product->name }}</h1>
                                        <p class="pr_short_info">Məhsulun kodu: {{$product->code}}</p>

                                        <div class="price_section">
                                            <div class="pr_price_info">
                                                <div class="itm_price" id="item_price">

                                                    @include('partials.product_price')


                                                </div>
                                            </div>
                                        </div>

                                        <div class="pr_row">
                                            <div class="pr_cat_name">{{translate('product_category')}}:</div>
                                            <div
                                                    class="pr_cat_info">{{$product->category->name[app()->getLocale()] ?? ''}}</div>
                                        </div>
                                        @if(count($product->types) > 0)
                                            <div class="pr_row">
                                                <div class="pr_cat_name">{{translate('product_type')}}:</div>
                                                @php $types = []; @endphp
                                                @foreach ($product->types as $type)
                                                    @php $types[] = $type->name[app()->getLocale()] ?? '' @endphp
                                                @endforeach
                                                <div class="pr_cat_info">{{implode(', ', $types)}}</div>
                                            </div>
                                        @endif

                                        @if(count($product->appearances) > 0)
                                            <div class="pr_row">
                                                <div class="pr_cat_name">{{translate('product_appearance')}}:</div>
                                                @php $appearances = []; @endphp
                                                @foreach ($product->appearances as $item)
                                                    @php $appearances[] = $item->name[app()->getLocale()] ?? '' @endphp
                                                @endforeach
                                                <div class="pr_cat_info">{{implode(', ', $appearances)}}</div>
                                            </div>
                                        @endif


                                        @if(count($product->refProperties) > 0)
                                            <div class="pr_row">
                                                <div class="pr_cat_name">{{translate('product_properties')}}:</div>
                                                @php $properties = []; @endphp
                                                @foreach ($product->refProperties as $item)
                                                    @php $properties[] = $item->name[app()->getLocale()] ?? '' @endphp
                                                @endforeach
                                                <div class="pr_cat_info">{{implode(', ', $properties)}}</div>
                                            </div>
                                        @endif

                                        @if(count($product->applicationAreas) > 0)
                                            <div class="pr_row">
                                                <div class="pr_cat_name">{{translate('product_application_areas')}}:
                                                </div>
                                                @php $applicationAreas= []; @endphp
                                                @foreach ($product->applicationAreas as $item)
                                                    @php $applicationAreas[] = $item->name[app()->getLocale()] ?? '' @endphp
                                                @endforeach
                                                <div class="pr_cat_info">{{implode(', ', $applicationAreas)}}</div>
                                            </div>
                                        @endif

                                        <div id="color_weights">
                                            @include('partials.product_color_weights')
                                        </div>


                                    </div>
                                    <div class="pr_tbl_right">
                                        <div class="pr_main_buttons">
                                            @if($calcProduct->consumption_norm)
                                                <a href="javascript:void(0)" class="pr_buttons open_self_calc"
                                                   data-consumption-norm="{!! $calcProduct->consumption_norm !!}">
                                                    <img src="{{asset('img/icons/pr_calc.svg?v1')}}" alt="calculator">
                                                </a>
                                            @endif
                                            <!-- <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_tpdf.svg?v1')}}" alt="pdf">
                                            </a>
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_mpdf.svg?v1')}}" alt="pdf">
                                            </a> -->
                                            @if($product->video)
                                                <a href="javascript:void(0)" class="pr_buttons video_button">
                                                    <img src="{{asset('img/icons/pr_video.svg?v1')}}" alt="video">
                                                </a>
                                            @endif
                                            <a href="#" target="_blank" class="pr_buttons">
                                                <img src="{{asset('img/icons/pr_print.svg?v1')}}" alt="print">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="product_select_proporties">

                                    <div class="pr_stock_info">
                                        {{--                                    <div class="itm_stock stocked">--}}
                                        {{--                                        <span class="stock_text">Stokda: 25 ədəd </span>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                    <div class="pr_row add_backet_sect">
                                        <div class="pr_slct_left">
                                            <div class="filter_check_items">
                                                <div class="product_counter">
                                                    <input type="hidden" name="counter" value="1">
                                                    <button type="button" class="pr_btn_counter pr_minus"></button>
                                                    <div class="pr_number_sect"><span class="pr_number">1</span></div>
                                                    <button type="button" class="pr_btn_counter pr_plus"></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="btn_detail btn_basket"
                                             onclick="addToCart({!! $product->id !!})">
                                            <span class="add_basket detail_basket_btn">
                                                Səbətə əlavə et
                                            </span>
                                            <span class="added_basket">
                                                Səbətə əlavə edildi
                                            </span>
                                            <span class="added_basket color_sect">
                                                Rəng seçimi edin
                                            </span>
                                        </div>
                                        <!-- click after addclass "dofav" -->

                                        <div
                                                class="btn_detail btn_fav @if(!is_null($product->favorites?->where('price_id', $price->id)->first())) dofav @endif"
                                                data-product-id="{!! $product->id !!}"
                                                data-price-id="{!! $price->id !!}">
                                            <span>
                                                Seçilmişlərdə saxla
                                            </span>
                                        </div>

                                    </div>
                                    <div class="share_section">
                                        <span class="sh_name">Paylaş:</span>
                                        <ul>
                                            <li class="sh_fb">
                                                <a href="javascript:void(0)"><img src="{{asset('img/icons/s_fb.svg')}}"
                                                                                  alt="fb"></a>
                                            </li>
                                            <li class="sh_tw">
                                                <a href="javascript:void(0)"><img src="{{asset('img/icons/s_twt.svg')}}"
                                                                                  alt="twt"></a>
                                            </li>
                                            <!-- <li class="sh_ms">
                                                <a href="javascript:void(0)"><img src="{{asset('img/icons/s_msg.svg')}}" alt="msg"></a>
                                            </li> -->
                                            <li class="sh_wp">
                                                <a href=""><img src="{{asset('img/icons/s_wp.svg')}}" alt="wp"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="in_detail">
                                        <p class="pr_select_title">
                                            200 AZN-dən yuxarı çatdırılma pulsuzdur.
                                        </p>
                                        <!-- <span class="pr_cat_name open_pop">
                                            Ətraflı
                                        </span> -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Product detail section -->

                <!-- Product tab content -->
                <div class="section_wrap wrap_tab_product">
                    <div class="sect_body clearfix">

                        <div class="benefit_tabs">
                            <div class="bf_tb_hd">
                                <div class="bt_tb_title clicked_tab_btn active" data-id="0">Məhsul haqqında</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="1">Texniki göstəricilər</div>
                                <div class="bt_tb_title clicked_tab_btn" data-id="2">Zəmanət və texniki dəstək</div>
                            </div>
                            <div class="bf_tb_content">
                                <div class="bf_tb_items " data-id="0">
                                    <div class="indicators_content">
                                        @if(!empty(trim($product->about)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Məhsul haqqında:</h6>
                                                <div>{!! $product->about !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->usage)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">İstifadə Sahələri:</h6>
                                                <div>{!! $product->usage !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->usage_rules)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">İstifadə Qaydaları:</h6>
                                                <div>{!! $product->usage_rules !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->advantage)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Üstünlükləri :</h6>
                                                <div>{!! $product->advantage !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->apply)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Tətbiqi :</h6>
                                                <div>{!! $product->apply !!}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bf_tb_items " data-id="1">
                                    <div class="indicators_content">
                                        @if(!empty(trim($product->properties)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">{{translate('product_properties')}}:</h6>
                                                <div>{!! $product->properties !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->consumption)))
                                            <div class="indicators_items">
                                                <div>{!! $product->consumption !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->properties)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Saxlama müddəti:</h6>
                                                <div>{!! $product->retention !!}</div>
                                            </div>
                                        @endif
                                        @if(!empty(trim($product->properties)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Xəbərdarlıqlar:</h6>
                                                <div>{!! $product->warning !!}</div>
                                            </div>
                                        @endif
                                        {{-- @if(!empty(trim($product->properties)))
                                            <div class="indicators_items">
                                                <h6 class="indicator_title">Zəmanət:</h6>
                                                <div>{!! $product->guarantee !!}</div>
                                            </div>
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="bf_tb_items " data-id="2">
                                    <div class="indicators_content">
                                        <ul style="list-style: none;margin: 0">
                                            <li>
                                                - @lang('Texniki göstəricilərdə qeyd edilmiş məlumatlar elmi ve təcrübi biliklərə əsaslanir')
                                                ;
                                            </li>
                                            <li>
                                                - @lang('"Matanat A" şirkəti məhsulun müvafiq texniki şərt və dövlət standartlarına uyğunluğuna zəmanət verir')
                                                .
                                            </li>
                                            <li>
                                                - @lang('Şirkətin mütəxəssislərinin rəhbərliyi altında görülən işlər istisna olmaqla, digər istifadəçilər tərəfindən təlimatdan kənar istifadə halları zamanı yarana biləcək problemlərə görə "Matanat A" şirkəti məsuliyyət daşımır')
                                                ;
                                            </li>
                                            <li>
                                                - @lang('Şirkət elmi-texniki inkişafla bağlı məhsulda dəyişiklik etmə hüququnu özündə saxlayır')
                                                ;
                                            </li>
                                            <li>
                                                - @lang('Texniki dəstək va ya daha geniş məlumat almaq üçün "Matanat A" şirkətinə müraciat edin')
                                                !
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product tab content -->
                @if($product->similar->count())
                    <!-- Product similar items -->
                    <div class="section_wrap wrap_category wrap_similar_product">
                        <div class="sect_header clearfix">
                            <h2 class="sect_title">
                                <a href="{!! route('category', $product->category_id) !!}">@lang('Oxşar məhsullar')</a>
                            </h2>
                        </div>
                        <div class="sect_body clearfix product detail_product">
                            <div class="row">
                                @foreach($product->similar as $similarProduct)
                                    <div class="col item_col clearfix">
                                        <div class="col_in">
                                            <div class="fav_sect">
                                                <!-- <div class="offer-tag">
                                                <p class="offer_val">Həftənin təklifi</p>
                                            </div> -->
                                                <!-- click after addclass "dofav" -->
                                                @auth()
                                                    <span class="favotites @if($similarProduct->favorite) dofav @endif"
                                                          data-product-id="{!! $similarProduct->id !!}"></span>
                                                @else
                                                    <span class="favotites dologin"></span>
                                                @endauth
                                            </div>
                                            <a href="{!! route('product', $similarProduct) !!}" class="item_img">
                                                <img src="{{asset('storage/'.$product->image)}}" alt="product">
                                            </a>
                                            <div class="item_content">
                                                <h4 class="itm_title">
                                                    <span class="itm_name">
                                                        {{ $similarProduct->name[app()->getLocale()] }}
                                                    </span>
                                                    <span class="itm_weight">
                                                        2.5 kq
                                                    </span>
                                                </h4>
                                                <div class="itm_info">
                                                    {{ $similarProduct->category->name[app()->getLocale()] }}
                                                </div>
                                                <div class="itm_price">
                                                    @php $price = $similarProduct->prices->first(); @endphp

                                                    <span class="new-price">@if($price->price > 0)
                                                            {{$price->price}} AZN
                                                        @else
                                                            ***
                                                        @endif</span>

                                                    @if($price->sale_price > 0 )
                                                        <span class="old-price">{!! $price->sale_price !!} AZN</span>
                                                    @endif
                                                </div>
                                                <!-- stocked, unstocked -->
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Product similar items -->
                @endif
                <div class="modal detail_modal" id="new_address_modal" data-id="create_address_modal">
                    <div class="modal_section">
                        <div class="modal_container">
                            <div class="modal_header">
                                <h5 class="modal_title">Ətraflı məlumat</h5>
                                <span class="close_modal"></span>
                            </div>
                            <div class="modal_body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at iusto similique
                                delectus, quos nemo sunt porro vero ipsum sint nihil, voluptatum eaque accusantium culpa
                                inventore, pariatur labore debitis voluptates.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio excepturi architecto
                                possimus aspernatur explicabo. Similique, commodi. Est a tempore perspiciatis nisi nemo
                                quidem consequuntur officia ratione? Obcaecati, nobis? Ad, minima?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal video_modal" id="new_address_modal" data-id="create_address_modal">
                    <div class="modal_section">
                        <div class="modal_container">
                            <div class="modal_body">
                                <div class="close_modal_block">
                                    <span class="close_modal"></span>
                                </div>
                                @if($product->video)
                                    <iframe width="560" height="315"
                                            src="{{ str_replace('watch?v=', 'embed/', $product->video ) }}"
                                            title="{!! $product->name !!}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal self_calculator_modal" id="detailCalculatorModal" data-id="detailCalculatorModal">
        <div class="modal_section" style="overflow: visible;">
            <div class="modal_container" style="overflow: visible;">
                <div class="modal_header">
                    <h5 class="modal_title">Kalkulyator</h5>
                    <span class="close_modal"></span>
                </div>
                <div class="modal_body">
                    <div class="select_item" style="width: 100%">
                        @if(!$product->dimension_changeable)
                            <div class="calc_inputs">
                                <div class="form_item">
                                    <label for="" id="width-label">Səthin eni (m):</label>
                                    <input type="text" id="selfWidth" name="email"
                                           placeholder="Səthin eni (m):" value=""
                                           class="item_input">
                                </div>
                                <div class="form_item">
                                    <label for="" id="length-label">Səthin uzunluğu
                                        (m):</label>
                                    <input type="text" name="email" id="selfLength"
                                           placeholder="Səthin uzunluğu (m):" value=""
                                           class="item_input">
                                </div>
                                <div class="form_item">
                                    <label for="">Tövsiyyə olunan qatın sayı:</label>
                                    <input type="text" name="email" id="selfLayers"
                                           placeholder="Tövsiyyə olunan qatın sayı"
                                           value="{!! isset($product) && !is_null($product->recommended_layers) ? $product->recommended_layers : '' !!}"
                                           class="item_input">
                                </div>
                                <div class="form_item disable_input">
                                    <label for="">Sərfiyyat norması (kq/kv.m):</label>
                                    <input disabled type="text" name="email"
                                           id="selfConsumption"
                                           placeholder="sərfiyyat norması (kq/kv.m):"
                                           value="{!! isset($product) && !is_null($product->consumption_norm) ? $product->consumption_norm : '' !!}"
                                           class="item_input">
                                </div>
                                <div class="form_item">
                                    <button type="submit" class="btn_sign submit_btn"
                                            id="selfCalculateBtn">Hesabla
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
                                                    <span id="selfResult">

                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div style="text-align: center">
                                Dəyişkəndir
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('select').on('select2:open', function () {
                var placeholderItem = $(this).data("placeholder");
                $('.select2-search--dropdown .select2-search__field').attr('placeholder', `${placeholderItem}`);
            });
            $('#products_main').select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $('.customDrop-main')
            });
            $('#products_other').select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $('.customDrop-other')
            });
            $("body").on("click", ".color_open", function () {
                $(".color_modal").addClass("opened");
            });
            $(".modal_select_btn").click(function () {
                $(".color_modal").removeClass("opened")
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.radio_btn input[type="checkbox"]').click(function () {
                if ($(this).prop('checked')) {
                    $('.radio_btn input[type="checkbox"]').not(this).prop('checked', false);
                }
            });
            $(".open_pop").click(function () {
                $(".modal.detail_modal").addClass("opened")
            })
            $(".video_button").click(function () {
                $(".modal.video_modal").addClass("opened")
            })
            $('.sh_fb').on('click', function (e) {
                e.preventDefault();
                const currentUrl = encodeURIComponent(window.location.href);
                const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
                window.open(shareUrl, '_blank');
            });
            $('.sh_tw').on('click', function (e) {
                e.preventDefault();
                const currentUrl = encodeURIComponent(window.location.href);
                const shareUrl = `https://twitter.com/intent/tweet?url=${currentUrl}`;
                window.open(shareUrl, '_blank');
            });
            // $('.sh_ms').on('click', function(e) {
            //     const currentUrl = encodeURIComponent(window.location.href);
            //     const shareUrl = `https://www.facebook.com/dialog/send?link=${currentUrl}`;
            //     window.open(shareUrl, '_blank');
            // });
            $('.sh_wp').on('click', function (e) {
                e.preventDefault();
                const currentUrl = encodeURIComponent(window.location.href);
                const shareUrl = `https://api.whatsapp.com/send?text=${currentUrl}`;
                window.open(shareUrl, '_blank');
            });
        });

        let activeLabel = null;
        $('body').on('click', '.color_save', function () {
            $('.catalog_row_inner .color_block').each(function () {

                if ($(this).hasClass('active')) {
                    let activeLabel = $(this);

                    let hexColor = activeLabel.find('.catalog_color').css('background-color');
                    console.log(hexColor);

                    let colorLabel = ` 
                        <label class="f_check_type radio_btn color_open">
                            <input type="radio" name="color_main" checked value="selected_color_value">
                            <span style="background-color: ${hexColor};"></span>
                        </label>
                    `;
                    $('.filter_check_items.colors').empty().append(colorLabel);
                }
            });
        });


        $(".color_block").click(function () {
            $('.color_block').removeClass('active');
            $(this).siblings().find("input").prop("checked", false)
            $(this).find("input").prop("checked", true)
            $(this).addClass('active');
        });
    </script>

    <script>
        $(document).ready(function () {

            var maxCount = 15;
            var minCount = 1;

            $('.pr_plus').click(function () {
                var $counterSection = $(this).closest('.product_counter');
                var $input = $counterSection.find('input[name="counter"]');
                var $numberSpan = $counterSection.find('.pr_number');

                var currentCount = parseInt($input.val());

                if (currentCount < maxCount) {
                    currentCount++;
                    $input.val(currentCount);
                    $numberSpan.text(currentCount);
                }
            });

            $('.pr_minus').click(function () {
                var $counterSection = $(this).closest('.product_counter');
                var $input = $counterSection.find('input[name="counter"]');
                var $numberSpan = $counterSection.find('.pr_number');

                var currentCount = parseInt($input.val());

                if (currentCount > minCount) {
                    currentCount--;
                    $input.val(currentCount);
                    $numberSpan.text(currentCount);
                }
            });

            $(".open_self_calc").click(function () {
                $(".self_calculator_modal").addClass("opened")
            });

            $('#selfCalculateBtn').click(function (event) {
                $(".answer_modal").addClass("opened")
                event.preventDefault();

                $('#selfResult').text('');

                var width = $('#selfWidth').val().trim();
                var length = $('#selfLength').val().trim();
                var layers = $('#selfLayers').val().trim();
                var consumption = $('#selfConsumption').val().trim();

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

                $('#selfResult').text(result.toFixed(2) + "kq");
            });
        });
    </script>


    <script>

        var color_id = 0;
        var weight_id = 0;

        //
        // $("body").on("change", "input[name='color']", function () {
        //     color_id = $(this).val();
        //     priceAjax()
        // })

        // $("body").on("change", "input[name='weight']", function () {
        //     weight_id = $(this).val();
        //     priceAjax()
        // })

        function priceAjax() {
            $.ajax({
                type: "POST",
                url: "{{route('product_price', $product->id)}}",
                data: {
                    color_id: color_id,
                    // weight_id: weight_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (result) {
                    $("#color_weights").html(result.html)
                    $("#item_price").html(result.price)
                }
            });
        }

        function addToCart(productId) {
            let colorId = $("input[name='color']:checked").val();
            let weightId = $('input[name="weight"]:checked').val();
            let count = $('input[name="counter"]').val();
            $.ajax({
                url: '{!! route('carts.add') !!}',
                method: 'POST',
                data: {
                    product_id: productId,
                    color_id: colorId,
                    weight_id: weightId,
                    count
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        let cartIcon = $('.icon_backet');
                        cartIcon.html('');
                        cartIcon.append(`<span class="cart_count">${data.totalProductCount}</span>`)

                    }
                },
                error: function (data) {

                }
            })
        }


    </script>
    <script>
        $(document).ready(function () {
            $(".btn_fav").on('click', function (e) {
                let productId = $(this).data('productId');
                let priceId = $(this).data('priceId');
                let el = $(this);
                let route = '{!! route('favorites.store') !!}';
                let method = 'post';

                if (el.hasClass('dofav')) {
                    method = 'delete'
                    route = '{!! url('favorites') !!}/' + productId;
                }
                $.ajax({
                    url: route,
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: productId,
                        price_id: priceId
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status === 'success') {
                            let favoriteCountEl = $('.favorite_count');

                            if (favoriteCountEl.length) {
                                let count = favoriteCountEl[0].innerText;
                                if (!isNaN(parseFloat(count)) && isFinite(count)) {
                                    if (!el.hasClass('dofav')) {
                                        count = parseInt(count) + 1;
                                    } else {
                                        count = parseInt(count) - 1;
                                    }
                                }

                                if (count === 0) {
                                    $('.favorite_count').remove();
                                } else if (count > 99) {
                                    favoriteCountEl[0].innerText = '99+';
                                } else {
                                    favoriteCountEl[0].innerText = count;
                                }
                            } else {
                                $('.icon_fav').after(`<span class="favorite_count">1</span>`)
                            }
                            el.toggleClass("dofav");
                        }
                    },
                });
            });
        });
    </script>
@endpush
