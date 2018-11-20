<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'studihub home') }}</title>

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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/apptemplate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Navbar</a>
          <form class="form-inline " >
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Learn anything" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </form>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse  mr-auto" id="navbarNavDropdown"  >
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
   
        <main class="py-4">
            @section('sub-header')
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>

</body>
</html>
