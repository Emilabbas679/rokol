@extends('layout')
@section('title', 'Error')
@push('meta')

@endpush

@push('css')

@endpush

@section('content')
    <!-- Wrap Category section -->
    <div class="section_wrap wrap_static_page">

        <div class="main_center clearfix">
            <div class="sect_body clearfix">
                <div class="error_page">
                    <div class="error_img">
                        <img src="{{asset('img/icons/404.svg')}}" alt="">
                    </div>

                    <h1>Üzr istəyirik, bu səhifəni tapa bilmədik</h1>
                    <p>
                        Daxil olmağa çalışdığınız səhifə mövcud deyil və ya köçürülüb. Əsas səhifəmizə qayıtmağa çalışın.
                    </p>
                    <a href="{{route('home')}}">Ana səhifəyə qayıt </a>
                </div>
            </div>
        </div>

    </div>
    <!-- Wrap Category section -->
@endsection

@push('js')

@endpush