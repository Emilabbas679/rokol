@extends('layout')
@section('title', translate('products'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Category section -->
    <div class="section_wrap wrap_category">
        <div class="main_center clearfix">

            <div class="sect_body clearfix">

                <div class="basket_mob_fix_back"></div>

                <div class="wrap_left mobile_fix_item">
                    <div class="filter_container">
                        <h2 class="filter_title">
                            Filterlər
                            <span class="close_filter"></span>
                        </h2>
                        @php $route = route('category', $category['id']);
                        if ($category['id'] == 0) {$route = route('products');}
                        @endphp
                        <form action="{{$route}}" id="formData">
                            <div class="filter_items">
                                <div class="filter_head">
                                    <h5>Məhsullar</h5>
                                </div>
                                <div class="select_item">
                                    <div class="form_item">
                                        <select name="parent_category_id" class="js-example-basic-single "
                                                id="products_main" data-placeholder="{{translate('main_categories')}}">
                                            <option value="0">{{translate('all')}}</option>
                                            @foreach($categories as $item)
                                                <option value="{{$item->id}}"
                                                        @if($category['id']==$item->id or $category['category_id'] == $item->id) selected @endif>{{$item->name[app()->getLocale()] ?? ''}}</option>
                                            @endforeach

                                        </select>
                                        <span class="customDrop customDrop-main"></span>
                                    </div>
                                    <div class="form_item">
                                        <select name="category_id" class="js-example-basic-single " id="products_other"
                                                data-placeholder="{{translate('sub_categories')}}">
                                            <option value="{{$category['category_id']}}">{{translate('all')}}</option>
                                        </select>
                                        <span class="customDrop customDrop-other"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="filter_items drop_filter_item">
                                <div class="filter_head price">
                                    <h5>{{translate('price')}}</h5>
                                </div>
                                <div class="filter_check_items">
                                    <div class="price_range_wrap">
                                        <div class="price-input">
                                            <div class="field">
                                                <input type="number" class="input-min" value="">
                                                <label>₼</label>
                                            </div>
                                            <div class="separator">-</div>
                                            <div class="field">
                                                <input type="number" class="input-max" value="">
                                                <label>₼</label>
                                            </div>
                                        </div>
                                        <div class="slider">
                                            <div class="progress" style="left: 21.34%; right: 54.09%;"></div>
                                        </div>
                                        <div class="range-input price-field">
                                            <input type="range" name="min_price" class="range-min" min="0" max="1000"
                                                   value="{{$selected['min_price']}}" step="1">
                                            <input type="range" name="max_price" class="range-max" min="0" max="1000"
                                                   value="{{$selected['max_price']}}" step="1">
                                        </div>
                                        <div class="price-wrap">
                                            <div class="price-wrap-1">
                                                <span class="minVal"></span>
                                                <label>AZN</label>
                                            </div>
                                            <div class="price-wrap-2">
                                                <span class="maxVal"></span>
                                                <label>AZN</label>
                                            </div>
                                        </div>
                                        <div class="custom_min_max" style="display: none;">
                                            <div class="row">
                                                <div class="col item_col">
                                                    <div class="col_in">
                                                        <input type="number" class="custom-min" placeholder="min"
                                                               min="0" max="1000" value="{{$selected['min_price']}}">
                                                    </div>
                                                </div>
                                                <div class="col item_col">
                                                    <div class="col_in">
                                                        <input type="number" class="custom-max" placeholder="max"
                                                               min="0" max="1000" value="{{$selected['max_price']}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="filter_items drop_filter_item">
                                <div class="filter_head properties">
                                    <h5>{{translate('properties')}}</h5>
                                </div>
                                <div class="filter_check_items">
                                    @if(isset($filters) )
                                        @if(isset($filters['refProperties']) && !is_null($filters['refProperties']))
                                            @foreach(properties() as $item)
                                                @if(!in_array($item->id, $filters['refProperties']))
                                                    @continue
                                                @endif
                                                <label data-url="{!! request()->filled('properties.'.$item->id) ? request()->fullUrlWithoutQuery("properties.{$item->id}.") : request()->fullUrlWithQuery(["properties[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                    <input type="checkbox" name="properties[{!! $item->id !!}]" value="{{$item->id}}"
                                                           @if(isset($selected['properties']) and in_array($item->id, $selected['properties'])) checked @endif>
                                                    <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    @else
                                        @foreach(properties() as $item)
                                            <label data-url="{!! request()->filled('properties.'.$item->id) ? request()->fullUrlWithoutQuery("properties.{$item->id}") : request()->fullUrlWithQuery(["properties[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                <input type="checkbox" name="properties[{!! $item->id !!}]" value="{{$item->id}}"
                                                       @if(isset($selected['properties']) and in_array($item->id, $selected['properties'])) checked @endif>
                                                <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="filter_items drop_filter_item">
                                <div class="filter_head appearances">
                                    <h5>{{translate('appearances')}}</h5>
                                </div>
                                <div class="filter_check_items">
                                    @if(isset($filters) )
                                        @if(isset($filters['appearances']) && !is_null($filters['appearances']))
                                            @foreach(appearances() as $item)
                                                @if(!in_array($item->id, $filters['appearances']))
                                                    @continue
                                                @endif
                                                <label data-url="{!! request()->filled('appearances.'.$item->id) ? request()->fullUrlWithoutQuery("appearances.{$item->id}") : request()->fullUrlWithQuery(["appearances[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                    <input type="checkbox" name="appearances[{!! $item->id !!}]" value="{{$item->id}}"
                                                           @if(isset($selected['appearances']) and in_array($item->id, $selected['appearances'])) checked @endif>
                                                    <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    @else
                                        @foreach(appearances() as $item)
                                            <label data-url="{!! request()->filled('appearances.'.$item->id) ? request()->fullUrlWithoutQuery("appearances.{$item->id}") : request()->fullUrlWithQuery(["appearances[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                <input type="checkbox" name="appearances[{!! $item->id !!}]" value="{{$item->id}}"
                                                       @if(isset($selected['appearances']) and in_array($item->id, $selected['appearances'])) checked @endif>
                                                <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="filter_items drop_filter_item">
                                <div class="filter_head weights">
                                    <h5>{{translate('weights')}}</h5>
                                </div>
                                <div class="filter_check_items">
                                    @if(isset($filters) )
                                        @if(isset($filters['weights']) && !is_null($filters['weights']))
                                            @foreach(weights() as $item)
                                                @if(!in_array($item->id, $filters['weights']))
                                                    @continue
                                                @endif
                                                <label data-url="{!! request()->filled('weights.'.$item->id) ? request()->fullUrlWithoutQuery("weights.{$item->id}") : request()->fullUrlWithQuery(["weights[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                    <input type="checkbox" name="weights[{!! $item->id !!}]" value="{{$item->id}}"
                                                           @if(isset($selected['weights']) and in_array($item->id, $selected['weights'])) checked @endif>
                                                    <span>{{$item->weight}} {!! productWeightUnit($item->weight_type) !!}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    @else
                                        @foreach(weights() as $item)
                                            <label data-url="{!! request()->filled('weights.'.$item->id) ? request()->fullUrlWithoutQuery("weights.{$item->id}") : request()->fullUrlWithQuery(["weights[{$item->id}]" => $item->id]) !!}" class="f_check_type">
                                                <input type="checkbox" name="weights[{!! $item->id !!}]" value="{{$item->id}}"
                                                       @if(isset($selected['weights']) and in_array($item->id, $selected['weights'])) checked @endif>
                                                <span>{{$item->weight}} {!! productWeightUnit($item->weight_type) !!}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="filter_items drop_filter_item">
                                <div class="filter_head brands">
                                    <h5>{{translate('Brands')}}</h5>
                                </div>
                                <div class="filter_check_items">
                                    @if(isset($filters) )
                                        @if(isset($filters['brands']) && !is_null($filters['brands']))
                                            @foreach(brands() as $item)
                                                @if(!in_array($item->id, $filters['brands']))
                                                    @continue
                                                @endif
                                                <label class="f_check_type">
                                                    <input type="checkbox" name="brands[]" value="{{$item->id}}"
                                                           @if(isset($selected['brands']) and in_array($item->id, $selected['brands'])) checked @endif>
                                                    <span>{{$item->name}}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    @else
                                        @foreach(brands() as $item)
                                            <label class="f_check_type">
                                                <input type="checkbox" name="brands[]" value="{{$item->id}}"
                                                       @if(isset($selected['brands']) and in_array($item->id, $selected['brands'])) checked @endif>
                                                <span>{{$item->name}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="filter_buttons">
                                <button type="button" class="filter_btn btn_reset" style="width:100%">Sıfırla</button>
                                <!-- <button type="submit" class="filter_btn btn_send">Təsdiqlə</button> -->
                            </div>
                        </form>


                    </div>
                </div>
                <div class="wrap_right moble_list_items">

                    <div class="benefit_tabs">

                        <div class="filter_sort_sect">
                            <div class="sort_count desk_show ">{!! $products->total() !!} @lang('məhsul tapıldı')</div>
                            <div class="sort_items">

                                <div class="sort_itm_mob">
                                    <div class="open_filter">
                                        Filter
                                    </div>

                                    <div class="sort_seletc_item">
                                        <span>Sırala:</span>
                                        <div class="form_item">
                                            <select name="sort_category_id" class="js-example-basic-single "
                                                    id="sort_main" data-placeholder="Most popular">
                                                <option value="0">@lang('Hamısı')</option>
                                                <option value="{!! request()->fullUrlWithQuery(['sort_by' => 'price,desc']) !!}" {!! request()->input('sort_by') == 'price,desc' ? 'selected' : '' !!}>@lang('Ən bahalı')</option>
                                                <option value="{!! request()->fullUrlWithQuery(['sort_by' => 'price,asc']) !!}" {!! request()->input('sort_by') == 'price,asc' ? 'selected' : '' !!}>@lang('Ən ucuz')</option>
                                                <option value="{!! request()->fullUrlWithQuery(['sort_by' => 'name,asc']) !!}" {!! request()->input('sort_by') == 'name,asc' ? 'selected' : '' !!}>@lang('Adına görə A-Z')</option>
                                                <option value="{!! request()->fullUrlWithQuery(['sort_by' => 'name,desc']) !!}" {!! request()->input('sort_by') == 'name,desc' ? 'selected' : '' !!}>@lang('Adına görə Z-A')</option>
                                            </select>
                                            <span class="customDrop customDrop-sort"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bf_tb_hd grid_button_items">
                                    <div class="sort_count">230 məhsul tapıldı</div>
                                    <div class="grid_button clicked_tab_btn btn_list {!! getViewCookie() == 'list' ? 'active' : '' !!}"
                                         data-id="0"></div>
                                    <div class="grid_button clicked_tab_btn btn_grid {!! getViewCookie() == 'grid' ? 'active' : '' !!}"
                                         data-id="1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="bf_tb_content">


                            <div class="bf_tb_items " data-id="0">
                                <div class="row_list listed_products" id="product_list">
                                    @include('partials.products-list')
                                </div>
                                @if($products->hasMorePages())
                                    <div class="sect_footer clearfix" id="more-list">
                                        <a class="more">
                                            Daha çox
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                 viewBox="0 0 25 24" fill="none">
                                                <path
                                                        d="M12.5 16.8C11.8 16.8 11.1 16.53 10.57 16L4.05002 9.48001C3.76002 9.19001 3.76002 8.71001 4.05002 8.42001C4.34002 8.13001 4.82002 8.13001 5.11002 8.42001L11.63 14.94C12.11 15.42 12.89 15.42 13.37 14.94L19.89 8.42001C20.18 8.13001 20.66 8.13001 20.95 8.42001C21.24 8.71001 21.24 9.19001 20.95 9.48001L14.43 16C13.9 16.53 13.2 16.8 12.5 16.8Z"
                                                        fill="#00428E"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="bf_tb_items " data-id="1">
                                <div class="row" id="product_grid">
                                    @include('partials.products')
                                </div>

                                @if($products->hasMorePages())
                                    <div class="sect_footer clearfix" id="more">
                                        <a href="javascript:void(0)" class="more">
                                            Daha çox
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                 viewBox="0 0 25 24" fill="none">
                                                <path
                                                        d="M12.5 16.8C11.8 16.8 11.1 16.53 10.57 16L4.05002 9.48001C3.76002 9.19001 3.76002 8.71001 4.05002 8.42001C4.34002 8.13001 4.82002 8.13001 5.11002 8.42001L11.63 14.94C12.11 15.42 12.89 15.42 13.37 14.94L19.89 8.42001C20.18 8.13001 20.66 8.13001 20.95 8.42001C21.24 8.71001 21.24 9.19001 20.95 9.48001L14.43 16C13.9 16.53 13.2 16.8 12.5 16.8Z"
                                                        fill="#00428E"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrap Category section -->

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
            $('#sort_main').select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $('.customDrop-sort')
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.radio_btn input[type="checkbox"]').click(function () {
                if ($(this).prop('checked')) {
                    $('.radio_btn input[type="checkbox"]').not(this).prop('checked', false);
                }
            });
        });
        $(document).ready(function () {
    let tiklananValues = {};

    const storedValues = sessionStorage.getItem("tiklananValues");
    if (storedValues) {
        tiklananValues = JSON.parse(storedValues);
        $(".filter_items").each(function () {
            const parentFilterHead = $(this).find(".filter_head");
            const currentFilterClass = parentFilterHead
                .attr("class")
                .split(" ")
                .find((cls) => cls !== "filter_head");
            const filterItems = $(this).find(".filter_check_items");

            if (tiklananValues[currentFilterClass]) {
                tiklananValues[currentFilterClass].forEach((value) => {
                    filterItems.find(`input[type="checkbox"][value="${value}"]`).prop("checked", true);
                });
            }
        });
    }

    function applyFiltersFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);

        urlParams.forEach((value, key) => {
            if (key.endsWith("[]")) {
                const filterClass = key.replace("[]", "");
                if (!tiklananValues[filterClass]) {
                    tiklananValues[filterClass] = [];
                }
                tiklananValues[filterClass].push(value);
            }
        });

        guncelleFiltreler({ data: tiklananValues });

        sessionStorage.setItem("tiklananValues", JSON.stringify(tiklananValues));
    }
    applyFiltersFromUrl();

    $(document).on("change", 'input[type="checkbox"]', function () {
        const parentFilterHead = $(this)
            .closest(".filter_items")
            .find(".filter_head");
        const filterClass = parentFilterHead
            .attr("class")
            .split(" ")
            .find((cls) => cls !== "filter_head");

        const tiklananValue = $(this).val();

        if ($(this).is(":checked")) {
            if (!tiklananValues[filterClass]) {
                tiklananValues[filterClass] = [];
            }
            tiklananValues[filterClass].push(tiklananValue);
        } else {
            tiklananValues[filterClass] = tiklananValues[filterClass].filter(
                (value) => value !== tiklananValue
            );
        }

        let apiUrl = "https://rokol.az/filters?";
        Object.keys(tiklananValues).forEach((filter) => {
            tiklananValues[filter].forEach((value) => {
                apiUrl += `${filter}[]=${value}&`;
            });
        });

        const minVal = $(".minVal").text().replace(/\D/g, '');
        const maxVal = $(".maxVal").text().replace(/\D/g, '');
        apiUrl += `min_price=${minVal}&max_price=${maxVal}&`;

        sessionStorage.setItem("apiUrl", apiUrl);
        sessionStorage.setItem("tiklananValues", JSON.stringify(tiklananValues));
        const updatedUrl = apiUrl.replace("filters", "products");
        sessionStorage.setItem("updatedUrl", updatedUrl);
        window.history.pushState({}, "", updatedUrl);

        $.ajax({
            url: apiUrl,
            type: "GET",
            success: function (data) {
                guncelleFiltreler(data);
            },
            error: function (xhr, status, error) {
            },
        });
        window.location.href = updatedUrl;
    });

    $(".range-input input").on("change", function () {
        const minVal = $(".minVal").text().replace(/\D/g, '');
        const maxVal = $(".maxVal").text().replace(/\D/g, ''); 

        let apiUrl = "https://rokol.az/filters?";
        Object.keys(tiklananValues).forEach((filter) => {
            tiklananValues[filter].forEach((value) => {
                apiUrl += `${filter}[]=${value}&`;
            });
        });

        apiUrl += `min_price=${minVal}&max_price=${maxVal}&`;

        sessionStorage.setItem("apiUrl", apiUrl);
        sessionStorage.setItem("tiklananValues", JSON.stringify(tiklananValues));
        // console.log("Range API URL:", apiUrl);
        const updatedUrl = apiUrl.replace("filters", "products");
        sessionStorage.setItem("updatedUrl", updatedUrl);
        window.history.pushState({}, "", updatedUrl);

        $.ajax({
            url: apiUrl,
            type: "GET",
            success: function (data) {
                guncelleFiltreler(data);
            },
            error: function (xhr, status, error) {
            },
        });

        window.location.href = updatedUrl;
    });

    function guncelleFiltreler(data) {
        $(".filter_items").each(function () {
            const parentFilterHead = $(this).find(".filter_head");
            const currentFilterClass = parentFilterHead
                .attr("class")
                .split(" ")
                .find((cls) => cls !== "filter_head");
            const filterItems = $(this).find(".filter_check_items");

            const apiData = data.data || {};

            let yeniVeri = null;

            if (
                currentFilterClass === "properties" &&
                apiData.hasOwnProperty("refProperties")
            ) {
                yeniVeri = apiData.refProperties;
            } else if (
                currentFilterClass === "brands" &&
                apiData.hasOwnProperty("brands")
            ) {
                yeniVeri = apiData.brands;
            } else if (
                currentFilterClass === "appearances" &&
                apiData.hasOwnProperty("appearances")
            ) {
                yeniVeri = apiData.appearances;
            } else if (
                currentFilterClass === "weights" &&
                apiData.hasOwnProperty("weights")
            ) {
                yeniVeri = apiData.weights;
            }

            if (!yeniVeri) {
                console.warn(`Veri bulunamadı: ${currentFilterClass}`);
                return;
            }

            filterItems.empty();
            Object.keys(yeniVeri).forEach((key) => {
                const label = $('<label class="f_check_type"></label>')
                    .attr("data-url", "https://rokol.az/products?" + yeniVeri[key].search);
                const input = $("<input>", {
                    type: "checkbox",
                    name: `${currentFilterClass}[${key}]`,
                    value: key,
                }).appendTo(label);

                const span = $("<span></span>")
                    .text(yeniVeri[key].name)
                    .appendTo(label);

                if (
                    tiklananValues[currentFilterClass] &&
                    tiklananValues[currentFilterClass].includes(key)
                ) {
                    input.prop("checked", true);
                }

                filterItems.append(label);
            });
            const storedUpdatedUrl = sessionStorage.getItem("updatedUrl");
            if (storedUpdatedUrl) {
                window.history.pushState({}, "", storedUpdatedUrl);
            }
        });
    }

    $(".btn_reset").on("click", function () {
        tiklananValues = {};

        $('input[type="checkbox"]').prop("checked", false);

        $.ajax({
            url: "https://rokol.az/filters",
            type: "GET",
            success: function (data) {
                guncelleFiltreler(data);
            },
            error: function (xhr, status, error) {
                // console.error("Sıfırlama API isteği başarısız oldu:", error);
                // console.error("Hata Detayları:", xhr, status);
            },
        });
        window.location.href = "https://rokol.az/products";
        sessionStorage.clear();
    });

    const storedApiUrl = sessionStorage.getItem("apiUrl");
    if (storedApiUrl) {
        $.ajax({
            url: storedApiUrl,
            type: "GET",
            success: function (data) {
                guncelleFiltreler(data);
            },
            error: function (xhr, status, error) {
                // console.error("Stored API isteği başarısız oldu:", error);
                // console.error("Hata Detayları:", xhr, status);
            },
        });
    }

    $(".filter_check_items .f_check_type").on("click", function () {
        let apiUrl = "https://rokol.az/filters?";
        Object.keys(tiklananValues).forEach((filter) => {
            tiklananValues[filter].forEach((value) => {
                apiUrl += `${filter}[]=${value}&`;
            });
        });

        sessionStorage.setItem("apiUrl", apiUrl);
    });

    $(document).on("click", ".f_check_type", function (event) {
        const url = $(this).data("url");
        if (url && url !== "#") {
            window.location.href = url;
        }
    });
});



    </script>
    <script>
        $(document).ready(function () {
            $(".favotites").on('click', function (e) {
                let productId = $(this).data('productId');
                let priceId = $(this).data('priceId');
                let el = $(this);
                let route = '{!! route('favorites.store') !!}';
                let method = 'post';
                // console.log(el.hasClass('dofav'))
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

    <script>
        $("#products_main").change(function () {
            let main_id = $(this).val();
            let redirectUrl = "{{env('APP_URL')}}/category/" + main_id;
            if (main_id == 0) {
                redirectUrl = "{{route('products')}}";
            }
            window.location.replace(redirectUrl);
            // categoriesAjax(main_id)
        })
        $("#products_other").change(function () {
            let category_id = $(this).val()

            window.location.replace("{{env('APP_URL')}}/category/" + category_id);

        })

        function categoriesAjax(main_id = 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('getSubCategories')}}",
                data: {
                    id: main_id,
                    category_id: "{{$category['id']}}",
                }
            }).done(function (data) {
                if (data.status == true) {
                    $("#products_other").html(data.html)
                }
            })
        }

        categoriesAjax($("#products_main").val())
    </script>

    <script>
        let page = 1;
        let pageUrl = window.location.protocol + window.location.pathname;
        $(".more").on('click', function () {
            let parent = $(this).parent();
            parent.hide();
            event.preventDefault();
            //
            //
            // let form = document.getElementById('formData');
            //
            // let formData = new FormData(form);
            // let data = {};
            // formData.forEach((value, key) => {
            //     if (value !== '' || value !== null) {
            //         console.log(key);
            //         if (data[key]) {
            //             if (Array.isArray(data[key])) {
            //                 data[key].push(value);
            //             } else {
            //                 data[key] = [data[key], value];
            //             }
            //         } else {
            //             data[key] = value;
            //         }
            //     }
            //
            // });

            let urlSearchParams = new URLSearchParams(window.location.search);
            let params = Object.fromEntries(urlSearchParams.entries());

            if (params.hasOwnProperty('page')) {
                page = parseInt(params.page) + 1;
                params.page = page;
            } else {
                params.page = ++page;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: pageUrl,
                dataType: 'JSON',
                data: params
            }).done(function (data) {
                if (data.status) {
                    $("#product_grid").append(data.htmlGrid)
                    $("#product_list").append(data.htmlList)
                    if (data.hasMorePages === true) {
                        parent.show();
                    } else {
                        parent.hide();
                    }
                }
                equalHeight();
            })

        })

        function equalHeight(event) {

            $('.wrap_category .bf_tb_items.active .col_in').matchHeight({property: 'min-height'});
            $('.item_content_btm .itm_title').matchHeight({property: 'min-height'});
            ;
            $('.itm_name.card_head').matchHeight({property: 'min-height'});
            $('.img_cover').matchHeight({property: 'min-height'});
        }

    </script>

    <script>
        $('#sort_main').on('change', function () {
            window.location.href = $(this).val();
        });
    </script>
@endpush
