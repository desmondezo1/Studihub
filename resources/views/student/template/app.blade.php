<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/16/2019
 * Time: 4:33 PM
 */
?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}" >
    <title>Studihub Student - @yield('page_title')</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keyword')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap-select.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">

    <link rel="stylesheet" href="/assets/admin/css/datetimepicker.min.css">
    <!-- Datatables CSS-->
    <link rel="stylesheet" href="/assets/vendor/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/vendor/datatables/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="/assets/vendor/datatables/css/dataTables.min.css">
    <link rel="stylesheet" href="/assets/vendor/datatables/css/jquery.dataTables.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/assets/vendor/aos/aos.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/assets/admin/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/assets/admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <link rel="stylesheet" href="/assets/admin/css/toastr.min.css">
    <!-- Favicon-->
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

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="@yield('body-class')">
<div class="page">
    @include('student.partials.header')

    <div class="page-content d-flex align-items-stretch">
        @include('student.partials.sidebar')
        <div class="content-inner">
            <!-- Page Header-->
            @yield("page-header")
            <!--- Breadcum here -->
            @include('student.partials.breadcrumb')

            <!-- Page Contents here -->
            @yield('content')

        <!-- Footer -->
        @include('student.partials.footer')
        <!--/.Footer-->
        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/popper.js/umd/popper.min.js"> </script>
<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap-select.min.js"></script>

<script src="/assets/admin/js/moment.min.js"></script>
<script src="/assets/admin/js/datetimepicker.min.js"></script>

<script src="/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="/assets/vendor/chart.js/Chart.min.js"></script>
<script src="/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/assets/admin/js/charts-home.js"></script>

<script src="/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendor/datatables/js/dataTables.jqueryui.min.js"></script>
<script src="/assets/vendor/datatables/js/dataTables.min.js"></script>
<script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<!-- Main File-->
<script src="/assets/admin/js/front.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<script src="/assets/admin/js/toastr.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/admin.js"></script>
<script>
    AOS.init();
</script>
@include('admin.notify.flash')
@stack('scripts')
</body>
</html>