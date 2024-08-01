<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | {{env('APP_NAME')}} </title>

    @stack('meta')

    <link rel="stylesheet" href="{{asset('css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel='stylesheet prefetch' href="{{asset('css/gallery/gallery.css')}}">
    <link rel="stylesheet" href="{{asset('css/gallery/gallery_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css?v='.time())}}" />
    <link rel="stylesheet" href="{{asset('css/footer.css?v='.time())}}" />
    <link rel="stylesheet" href="{{asset('css/style.css?v='.time())}}" />
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    @stack('css')
</head>

<body>
<div class="page ">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</div>

</body>


<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/gallery/picturefill.min.js')}}"></script>
<script src="{{asset('js/gallery/lightgallery.js')}}"></script>
<script src="{{asset('js/gallery/lg-autoplay.js')}}"></script>
<script src="{{asset('js/gallery/lg-zoom.js')}}"></script>
<script src="{{asset('js/gallery/lg-hash.js')}}"></script>
<script src="{{asset('js/gallery/lg-pager.js')}}"></script>
<script src="{{asset('js/gallery/jquery.mousewheel.min.js')}}"></script>
<script src="{{asset('js/gallery/gallery_index.js')}}"></script>
<script src="{{asset('js/gallery/lg-fullscreen.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('js/myjs.js?v5')}}"></script>

@stack('js')


</html>
