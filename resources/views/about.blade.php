@extends('layout')
@section('title', translate('about'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Profile section -->

    <div class="section_wrap wrap_static_page">
        <div class="main_center clearfix">
            <div class="sect_body clearfix">
                <div class="static_container clearfix">
                    <img src="{!! asset('storage/'.$about->image) !!}" alt="Main slider Image">
                    <h1> {{ $about->title[app()->getLocale()] }} </h1>
                    {!! $about->body[app()->getLocale()] !!}

                </div>

            </div>

        </div>
    </div>
    <!-- Product similar items -->

    <!-- Wrap Profile section -->

@endsection

@push('js')

@endpush
