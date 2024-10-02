@extends('layout')
{{--@section('title', $category['name'][app()->getLocale() ?? ''])--}}
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<div class="section_wrap wrap_news_page">
    <div class="main_center clearfix">
        <div class="sect_header clearfix news_header">
            <h2 class="sect_title">
                <a href="">Xəbərlər</a>
            </h2>
            <div class="sort_items">
               <div class="sort_itm_mob">
                   <div class="sort_seletc_item">
                        <span>Bölmə:</span>
                        <div class="form_item">
                            <select name="sort_category_id" class="js-example-basic-single " id="sort_main" data-placeholder="Hamısı">
                                <option value="0">Hamısı </option>
                                <option value="1">Ustalar Klubu	</option>
                                <option value="2">Kompaniyalar </option>
                                <option value="3">Görüş və seminarlar </option>
                            </select>
                            <span class="customDrop customDrop-sort"></span>
                        </div>
                    </div>
               </div>
           </div>
        </div>
        <div class="sect_body clearfix">
            <div class="row">

                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item1.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item2.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item1.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item2.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item1.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item2.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/item3.png?v1')}}" alt="News">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">23 avq, 2024 / 15:14</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Bakı və bəzi bölgələrdə güclü külək əsəcək - XƏBƏRDARLIQ
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <div class="pagination">
                <ul class="pagination_list">
                    <li class="first-a">
                        <a href=""></a>
                    </li>
                    <li>
                        <a href="">1</a>
                    </li>
                    <li>
                        <a href="">2</a>
                    </li>
                    <li class="active">
                        <a href="">3</a>
                    </li>
                    <li>
                        <a href="">4</a>
                    </li>
                    <li>
                        <a href="">5</a>
                    </li>
                    <li class="last-a">
                        <a href=""></a>
                    </li>
                </ul>
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
@endpush
