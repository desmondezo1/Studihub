<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studihub - @yield('page_title')</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keyword')"/>

     <!-- favicon -->
     <link href="{{ asset('img/apple-icon-57x57.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-60x60.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-72x72.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-76x76.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-114x114.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-120x120.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-144x144.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-152x152.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/apple-icon-180x180.png') }}" rel="apple-touch-icon">
     <link href="{{ asset('img/android-icon-192x192.png') }}" rel="icon">
     <link href="{{ asset('img/favicon-32x32.png') }}" rel="icon">
     <link href="{{ asset('img/favicon-96x96.png') }}" rel="icon">
     <link href="{{ asset('img/favicon-16x16.png') }}" rel="icon">
     <link href="{{ asset('img/manifest.json') }}" rel="stylesheet">

     <meta name="Studihub" content="#ffffff">
     <meta name="Studihub" content="{{ asset('img/ms-icon-144x144.png') }}">
     <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/radialprogress.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ URL::asset('/css/apptemplate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/course-content.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/show-topic.css') }}" rel="stylesheet">
    <!-- animate css -->
    <link rel="stylesheet" href="/assets/vendor/aos/aos.css">
    


    @yield('styles')
    

    @yield('head')

</head>
<body class="@yield('body-class')">

        @include('partials.header')
        <!--header-->

        <!--content-->
        <main class="">
        @yield('content')
        </main>
        <!--content-->

        <!--Footer-->
        @include('partials.footer')
        <!--/.Footer-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/animatebuttontext.js') }}" ></script>
        <script src="/assets/vendor/aos/aos.js"></script>
        <script>
            AOS.init();
        </script>
     @stack('scripts')
</body>
</html>
