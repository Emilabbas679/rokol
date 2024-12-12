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
                    <h2 class="sect_title">Rəng kataloqu </h2>
                </div>
                <div class="sect_body clearfix catalog_filter">
                    <div class="row catalog_row_main">
                        @foreach($colorGroups as $colorGroup)
                            <div class="col item_col clearfix">
                                <div class="catalog_head">
                                    <div class="catalog_title">
                                <span class="catalog_val_n">
                                    {{ $colorGroup->name[app()->getLocale()] }}
                                </span>
                                        <a class="login_btn" href="{!! route('colors.groups.show', $colorGroup) !!}">kataloqa bax</a>
                                    </div>
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