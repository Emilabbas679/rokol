@extends('layout')
@section('title', translate('about'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <div class="section_wrap wrap_static_page">
        <div class="main_center clearfix">
            <div class="sect_body clearfix">
                <div class="static_container clearfix">
                    @if(!is_null($page->image))
                        <img src="{!! asset('storage/'.$page->image) !!}" alt="{{ $page->title[app()->getLocale()] }}">
                    @endif
                    <h1> {{ $page->title[app()->getLocale()] }} </h1>
                    {!! $page->body[app()->getLocale()] !!}

                </div>

            </div>

        </div>
    </div>
@endsection

@push('js')

@endpush
