@extends('layout')
@section('title', $category['name'][app()->getLocale() ?? ''])
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<div class="section_wrap wrap_category">
    <div class="main_center clearfix">

        <div class="sect_body clearfix">
            <div class="wrap_left">
                <div class="filter_container">
                    <h2 class="filter_title">Filterlər</h2>

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
                                    <select name="parent_category_id" class="js-example-basic-single " id="products_main" data-placeholder="{{translate('main_categories')}}">
                                            <option value="0">{{translate('all')}}</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" @if($category['id'] == $item->id or $category['category_id'] == $item->id) selected @endif>{{$item->name[app()->getLocale()] ?? ''}}</option>
                                        @endforeach

                                    </select>
                                    <span class="customDrop customDrop-main"></span>
                                </div>
                                <div class="form_item">
                                    <select name="category_id" class="js-example-basic-single " id="products_other" data-placeholder="{{translate('sub_categories')}}">
                                        <option value="{{$category['category_id']}}">{{translate('all')}}</option>
                                    </select>
                                    <span class="customDrop customDrop-other"></span>
                                </div>
                            </div>
                        </div>
                        <div class="filter_items drop_filter_item">
                            <div class="filter_head">
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
                                        <input type="range" name="min_price" class="range-min" min="0" max="10000" value="{{$selected['min_price']}}" step="1">
                                        <input type="range" name="max_price" class="range-max" min="0" max="10000" value="{{$selected['max_price']}}" step="1">
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
                                                    <input type="number" class="custom-min" placeholder="min" min="0" max="10000" value="{{$selected['min_price']}}">
                                                </div>
                                            </div>
                                            <div class="col item_col">
                                                <div class="col_in">
                                                    <input type="number" class="custom-max" placeholder="max" min="0" max="10000" value="{{$selected['max_price']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="filter_items drop_filter_item">
                            <div class="filter_head">
                                <h5>{{translate('properties')}}</h5>
                            </div>
                            <div class="filter_check_items">
                                @foreach(properties() as $item)
                                <label class="f_check_type">
                                    <input type="checkbox" name="properties[]" value="{{$item->id}}" @if(isset($selected['properties']) and  in_array($item->id, $selected['properties'])) checked @endif>
                                    <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>



                        <div class="filter_items drop_filter_item">
                            <div class="filter_head">
                                <h5>{{translate('appearances')}}</h5>
                            </div>
                            <div class="filter_check_items">
                                @foreach(appearances() as $item)
                                    <label class="f_check_type">
                                        <input type="checkbox" name="appearances[]" value="{{$item->id}}" @if(isset($selected['appearances']) and  in_array($item->id, $selected['appearances'])) checked @endif>
                                        <span>{{$item->name[app()->getlocale()] ?? ''}}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter_items drop_filter_item">
                            <div class="filter_head">
                                <h5>{{translate('weights')}}</h5>
                            </div>
                            <div class="filter_check_items">
                                @foreach(weights() as $item)
                                    <label class="f_check_type">
                                        <input type="checkbox" name="weights[]" value="{{$item->id}}" @if(isset($selected['weights']) and  in_array($item->id, $selected['weights'])) checked @endif>
                                        <span>{{$item->weight}} @if($item->weight_type == 0) Q @else Kq @endif</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="filter_buttons">
                            <button type="button" class="filter_btn btn_reset">Sıfırla</button>
                            <button type="submit" class="filter_btn btn_send">Təsdiqlə</button>
                        </div>
                    </form>


                </div>
            </div>
            <div class="wrap_right">

                <div class="benefit_tabs">

                    <div class="filter_sort_sect">
                        <div class="sort_count">230 məhsul tapıldı</div>
                        <div class="sort_items">
                            <div class="sort_seletc_item">
                                Sort by:
                                <div class="form_item">
                                    <select name="sort_category_id" class="js-example-basic-single " id="sort_main" data-placeholder="Most popular">
                                        <option value="0">Most popular</option>
                                        <option value="1">Most expensive </option>
                                        <option value="2">Most cheap </option>
                                    </select>
                                    <span class="customDrop customDrop-sort"></span>
                                </div>
                            </div>
                            <div class="bf_tb_hd grid_button_items">
                                <div class="grid_button clicked_tab_btn btn_list " data-id="0"></div>
                                <div class="grid_button clicked_tab_btn btn_grid active" data-id="1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bf_tb_content">

                        
                        <div class="bf_tb_items " data-id="0">
                            <div class="row_list" id="product_list">

                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col_in list_items">
                                    <a href="https://rokol.ain.az/product/16" class="item_img">
                                        <img src="https://rokol.ain.az/storage/OywOT0xeK1Vv5e35zugqSDWZCiZsICIMKk1JeWGe.png" alt="product">
                                    </a>
                                    <div class="item_content">

                                        <div class="list_left_itm">
                                            <h4 class="itm_title">
                                                <span class="itm_name">Rokol plus paint</span>
                                                <span class="itm_weight">10 Kq </span>
                                            </h4>                                        
                                            <div class="itm_info">Sellülozik Boya</div>
                                        </div>
                                        <div class="list_right_itm">
                                            <div class="itm_price">
                                                <span class="new-price">4.50 AZN</span>
                                                <span class="old-price">5.00 AZN</span>
                                            </div>
                                            <div class="itm_more_sect">
                                                <div class="itm_more">
                                                    Səbətə əlavə et
                                                </div>
                                                <div class="itm_stock stocked">
                                                    <span class="stock_text">Stokda: 25 ədəd</span>
                                                </div>
                                            </div>

                                            <div class="fav_sect">
                                                <span class="favotites "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if(count($products) == 20)
                            <div class="sect_footer clearfix" id="more">
                                <a href="javascripti:void(0)" class="more" >
                                    Daha çox
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path
                                            d="M12.5 16.8C11.8 16.8 11.1 16.53 10.57 16L4.05002 9.48001C3.76002 9.19001 3.76002 8.71001 4.05002 8.42001C4.34002 8.13001 4.82002 8.13001 5.11002 8.42001L11.63 14.94C12.11 15.42 12.89 15.42 13.37 14.94L19.89 8.42001C20.18 8.13001 20.66 8.13001 20.95 8.42001C21.24 8.71001 21.24 9.19001 20.95 9.48001L14.43 16C13.9 16.53 13.2 16.8 12.5 16.8Z"
                                            fill="#00428E" />
                                    </svg>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="bf_tb_items " data-id="1">
                            <div class="row" id="product_grid">
                                @include('partials.products')
                            </div>

                            @if(count($products) == 20)
                            <div class="sect_footer clearfix" id="more">
                                <a href="javascripti:void(0)" class="more" >
                                    Daha çox
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path
                                            d="M12.5 16.8C11.8 16.8 11.1 16.53 10.57 16L4.05002 9.48001C3.76002 9.19001 3.76002 8.71001 4.05002 8.42001C4.34002 8.13001 4.82002 8.13001 5.11002 8.42001L11.63 14.94C12.11 15.42 12.89 15.42 13.37 14.94L19.89 8.42001C20.18 8.13001 20.66 8.13001 20.95 8.42001C21.24 8.71001 21.24 9.19001 20.95 9.48001L14.43 16C13.9 16.53 13.2 16.8 12.5 16.8Z"
                                            fill="#00428E" />
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
$(document).ready(function() {
    $('select').on('select2:open', function() {
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
$(document).ready(function() {
    $('.radio_btn input[type="checkbox"]').click(function() {
        if ($(this).prop('checked')) {
            $('.radio_btn input[type="checkbox"]').not(this).prop('checked', false);
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $(".favotites").click(function(e) {
        e.preventDefault();
        e.stopPropagation()
        $(this).toggleClass("dofav");
    });
});
</script>

<script>
    $("#products_main").change(function (){
        let main_id = $(this).val();
        let redirectUrl = "{{env('APP_URL')}}/category/"+main_id;
        if(main_id == 0) {
            redirectUrl = "{{route('products')}}";
        }
        window.location.replace(redirectUrl);
        // categoriesAjax(main_id)
    })
    $("#products_other").change(function () {
        let category_id = $(this).val()

        window.location.replace("{{env('APP_URL')}}/category/"+category_id);

    })

    function categoriesAjax(main_id=0)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:   "POST",
            url: "{{route('getSubCategories')}}",
            data:   {
                id: main_id,
                category_id: "{{$category['id']}}",
            }}).done(function(data) {
            if(data.status == true) {
                $("#products_other").html(data.html)
            }
        })
    }

    categoriesAjax($("#products_main").val())

</script>

<script>
    var page = 0;
    $("#more").click(function () {
        $("#more").hide()
        event.preventDefault();
        let form = document.getElementById('formData');
        let formData = new FormData(form);
        let data = {};
        formData.forEach((value, key) => {
            if (data[key]) {
                if (Array.isArray(data[key])) {
                    data[key].push(value);
                } else {
                    data[key] = [data[key], value];
                }
            } else {
                data[key] = value;
            }
        });
        page = page+1;
        data['page'] = page;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:   "POST",
            url: "{{route('category', $category['id'])}}",
            data: data }).done(function(data) {
                if(data.status == true) {
                    $("#product_grid").append(data.html)
                    if(data.count == 20) {
                        $("#more").show()
                    }
                }
        })

    })
</script>
@endpush
