@extends('layout')
@section('title', translate('news'))
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
                <a href="">Kataloqlar</a>
            </h2>
        </div>
        <div class="sect_body clearfix catalog_pdf">
            <div class="row">
                <div class="col">
                    <div class="col_in">
                        <a href="#" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Məhsul kataloqu
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="#" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Həftənin təklifi kataloqu
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="#" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        İnşaat kataloqu
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="#" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Məhsul kataloqu
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="col_in">
                        <a href="#" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="">
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        Həftənin təklifi kataloqu
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Wrap Category section -->

@endsection
