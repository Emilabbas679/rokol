@extends('layout')
@section('title', translate('offer_of_week'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')
    <div class="section_wrap wrap_category wrap_profile_sect">
        <div class="main_center clearfix">
            <div class="sect_header clearfix">
                <h2 class="sect_title">@lang('Həftəni̇n təkli̇fləri')</h2>
            </div>
            <div class="sect_body clearfix offer">
                <div class="row">
                    @include('partials.products')
                </div>
            </div>
        </div>
        {!! $products->links() !!}
    </div>
@endsection

@push('js')

@endpush
