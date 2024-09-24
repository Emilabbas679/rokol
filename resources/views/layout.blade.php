<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>@yield('title') | {{env('APP_NAME')}} </title>

    @stack('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="{{asset('css/reset.css')}}" >
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}" >
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/header.css?v='.time())}}" >
    <link rel="stylesheet" href="{{asset('css/footer.css?v='.time())}}" >
    <link rel="stylesheet" href="{{asset('css/style.css?v='.time())}}" >
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

<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('js/jquery.inputmask.min.js?v123')}}"></script>
<script src="{{asset('js/myjs.js?v='.time())}}"></script>


@stack('js')

</body>

</html>
