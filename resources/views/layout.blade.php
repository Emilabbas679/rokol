<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ setting('site_name', config('app.name')) }} </title>

    @stack('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css?v=' . time())}}">
    <link rel="stylesheet" href="{{asset('css/footer.css?v=' . time())}}">
    <link rel="stylesheet" href="{{asset('css/style.css?v=' . time())}}">
    <link rel="shortcut icon" href="{{asset('favrokol.ico')}}" type="image/x-icon">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/48598643.js"></script>
    <!-- End of HubSpot Embed Code -->
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5Z2765RC');</script>
    <!-- End Google Tag Manager -->
    <meta name="google-site-verification" content="NKCG-YTaeT_5FUuJ1ZNYppM-CyDxSLfzbRnqcASsCsk" />
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
    <script src="{{asset('js/myjs.js?v=' . time())}}"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Z2765RC" height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>
        $(document).ready(function () {
            const currentUrl = window.location.href;
            if (!currentUrl.includes("/products")) {
                sessionStorage.clear();
            } else {
            }
        });
    </script>

    @stack('js')

</body>

</html>