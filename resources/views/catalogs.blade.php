@extends('layout')
@section('title', translate('colors'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Color Table -->

<div class="section_wrap wrap_catalogs_page">

    <div class="main_center clearfix">
        <div class="adrs_container clearfix">
            <div class="sect_header clearfix">
                <h2 class="sect_title">Kataloqlar </h2>
            </div>
            <div class="sect_body clearfix">
                <div class="row catalog_row_main">

                    @foreach($colors->groupBy('code') as $colorCat)

                        <div class="col item_col clearfix">
                        <div class="catalog_head">
                            <div class="catalog_title">
                                <span class="catalog_val">{{ $colorCat->first()->code }}</span>
                                <span class="catalog_val_n">{{ $colorCat->first()->name['az'] }}</span>
                            </div>
                            <div class="catalog_info">{{ $colorCat->first()->name['en'] }} / {{ $colorCat->first()->name['ru'] }}</div>
                        </div>
                        <div class="row catalog_row_inner">

                            @foreach($colorCat as $color)
                            <div class="col item_col clearfix">
                                <div class="catalog_color" style="background: {{ $color->hex }};"></div>
                                <div class="catalog_name">{{ $color->name[app()->getLocale()] }}</div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Product similar items -->

<!-- Wrap Profile section -->

@endsection

@push('js')

@endpush
