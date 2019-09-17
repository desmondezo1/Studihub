<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/16/2019
 * Time: 4:27 PM
 */
?>

<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ Auth::guard('student')->user()->photo }}" alt="{{ Auth::guard('student')->user()->fullname }}" class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::guard('student')->user()->fullname }}</h1>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i>Home </a></li>
        <li><a href="{{ route('students.questions.index') }}"><i class="fa fa-question"></i> Questions</a></li>

        <li><a href="#coursedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i> Courses </a>
            <ul id="coursedropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.enrolled.index') }}">Enrolled Courses</a></li>
                <li><a href="{{ route('admin.topics.index') }}">Topics</a></li>
            </ul>
        </li>


        <li><a href="#accountsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i> Purchase History </a>
            <ul id="accountsdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Payment</a></li>
            </ul>
        </li>
        <li><a href="login.html"> <i class="fa fa-envelope"></i> Messages </a></li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="fa fa-pencil-square"></i> Profile </a></li>

    </ul>
</nav>
