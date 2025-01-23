@extends('layout')
@section('title', translate('catalogs'))
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
                <a href="">{{translate('header_catalogs')}}</a>
            </h2>
        </div>
        <div class="sect_body clearfix catalog_pdf">
            <div class="row">
                @foreach($catalogs as $catalog)
                <div class="col">
                    <div class="col_in">
                        <a href="{{route('catalogs.show', ['id' => $catalog])}}" title="" class="stat_item_link">
                            <div class="stat_img">
                                <img class="catalog_main_img" src="{!! asset('storage/'.$catalog->image) !!}" alt="{!! $catalog->name !!}">
                                <div class="pdf_logo">
                                    <img src="{{asset('img/icons/catalog_pdf.svg?v2')}}" alt="{!! $catalog->name !!}">
                                </div>
                            </div>
                            <div class="news_item_content">
                                <div class="odds_row">
                                    <h2 class="stat_title">
                                        {!! $catalog->name !!}
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach



            </div>
            {!! $catalogs->links() !!}
        </div>
    </div>
</div>
<!-- Wrap Category section -->

@endsection

