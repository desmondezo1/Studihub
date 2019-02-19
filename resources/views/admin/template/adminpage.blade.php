
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/apptemplate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/adminpage.css') }}" rel="stylesheet">
    @yield('css')

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

    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    @yield('js')
</head>
<body>
        <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        
                        <picture>
                            <source height="50px" media="(min-width: 481px)" srcset="{{ asset('img/studi-blue.png') }}">
                            <source height="50px" media="(max-width: 480px)" srcset="{{ asset('img/logo.png') }}">
                            <img height="50px" src="{{ asset('img/logo.png') }}" alt="Studihub Logo">
                        </picture>
                    </div>
        
                    <ul class="list-unstyled components">
                        <p>Welcome Desmond</p>
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#">Home 1</a>
                                </li>
                                <li>
                                    <a href="#">Home 2</a>
                                </li>
                                <li>
                                    <a href="#">Home 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/messages"><i class="far fa-comments"></i> Messages</a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-sticky-note"></i>  Lesson Notes</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="/admin/createlesson"><i class="fas fa-plus-circle"></i>  Create</a>
                                </li>
                                <li>
                                    <a href="/admin/lessons"><i class="fas fa-list-ol"></i>  List Lessons</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                                <a href="#question" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-question-circle"></i>  Questions</a>
                                <ul class="collapse list-unstyled" id="question">
                                    <li>
                                        <a href="/admin/addquestion"><i class="fas fa-plus-circle"></i>  Add Question</a>
                                    </li>
                                    <li>
                                        <a href="/admin/questions"><i class="fas fa-list-ol"></i>  List Questions</a>
                                    </li>
                                </ul>
                            </li>
                        <li>
                            <a href="#"><i class="far fa-user"></i>  Account</a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-credit-card"></i>  Payments</a>
                        </li>
                        
                    </ul>
        
                    <ul class="list-unstyled CTAs">
                        <li>
                            <a href="" class="download"><i class="fas fa-cog"></i>  Settings</a>
                        </li>
                        <li>
                            <a href="" class="article"><i class="fas fa-flag"></i>  Report Issue</a>
                        </li>
                    </ul>
                </nav>
 <!-- Page Content  -->
 <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
                </button>
                <h4 style="padding-left:20px; color:#ddd; margin:0;"> @yield('page', 'admin page')</h4>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')




        
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
    
@yield('jsscript')



</body>
</html>