@extends('layout')
@section('title', translate('colors'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')
    <div class="section_wrap wrap_catalogs_page">

        <div class="main_center clearfix">
            <div class="adrs_container clearfix">
                <div class="sect_header clearfix">
                    <h2 class="sect_title">Rəng kataloqu </h2>
                </div>
                <div class="sect_body clearfix">
                    @php
                        $looped = false;
                    @endphp

                    @foreach($colors as $color)
                        @if($color->children->count())
                            @php
                                $looped = true;
                            @endphp
                            <div class="row catalog_row_main">
                                <div class="col item_col clearfix">
                                    <div class="catalog_head">
                                        <div class="catalog_title">
                                            <span class="catalog_val">{{ $color->code }}</span>
                                            <span class="catalog_val_n">{{ $color->name['az'] }}</span>
                                        </div>
                                        <div class="catalog_info">{{ $color->name['en'] }}
                                            / {{ $color->name['ru'] }}</div>
                                    </div>
                                    <div class="row catalog_row_inner">
                                        <div class="col item_col clearfix">
                                            <div class="catalog_color" style="background: {{ $color->hex }};"></div>
                                            <div class="catalog_name">{{ $color->name[app()->getLocale()] }}</div>
                                        </div>
                                        @foreach($color->children as $c)
                                            <div class="col item_col clearfix">
                                                <div class="catalog_color" style="background: {{ $c->hex }};"></div>
                                                <div class="catalog_name">{{ $c->name[app()->getLocale()] }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @if(!$looped)
                        <div class="row catalog_row_main m-0 full_colors">
                            <div class="row catalog_row_inner">

                                @foreach($colors as $color)

                                    <div class="col item_col clearfix">
                                        <div class="catalog_color" style="background: {{ $color->hex }};"></div>
                                        <div class="catalog_name">{{ $color->name[app()->getLocale()] }}</div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
