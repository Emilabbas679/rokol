@extends('layout')
@section('title', 'news')
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
                                <option value="0">Hamısı</option>
                                <option value="{!! \App\Models\Blog::CATEGORY_MASTERS_CLUB !!}">Ustalar Klubu</option>
                                <option value="{!! \App\Models\Blog::CATEGORY_CAMPAIGNS !!}">Kompaniyalar</option>
                                <option value="{!! \App\Models\Blog::CATEGORY_MEETS_AND_SEMINARS !!}">Görüş və seminarlar</option>
                            </select>
                            <span class="customDrop customDrop-sort"></span>
                        </div>
                    </div>
               </div>
           </div>
        </div>
        <div class="sect_body clearfix">
            <div class="row">

                @foreach($articles as $article)
                <div class="col">
                    <div class="col_in">
                        <a href="{!! route('news.show', $article) !!}" target="_blank" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('storage/'.$article->image)}}" alt="{{ $article->title[app()->getLocale()] }}">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h3 class="stat_catg">{!! $article->created_at->format('d M, Y / H:i') !!}</h3>
                                </div>
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        {{ $article->title[app()->getLocale()] }}
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
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
