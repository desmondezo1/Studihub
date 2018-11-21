<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studihub -{{$name}}</title>

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
    <link href="{{ URL::asset('css/apptemplate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/course-content.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#" style="margin:0;"><img height="50px" src="{{ asset('img/logo.png') }}" alt="Studihub Logo"></a>
          <form class="form-inline mx-auto" >
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Learn anything" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </form>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse " id="navbarNavDropdown"  >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
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
   
        <main class="">
            @yield('sub-header')

            @section('suggestions')
            <span class="alert-danger">Courses Unavailable at the moment</span>
            @show

            @section('courses')
            <span class="alert-danger">Courses Unavailable at the moment</span>
            @show

            @section('skills')
            <span class="alert-danger">Courses Unavailable at the moment</span>
            @show
        </main>

    @section('footer')
           
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns here to organize your footer content.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href=""> STUDIHUB EDUCATION SERVICES</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
  
  @show
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>

</body>
</html>
