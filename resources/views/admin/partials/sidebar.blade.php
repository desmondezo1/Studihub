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
        <div class="avatar"><img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->fullname }}" class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->fullname }}</h1>
            <p>Role: {{ Auth::user()->roles ? Auth::user()->roles->first()->name : "No Role" }}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.index') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="#studentdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation"></i> Students </a>
            <ul id="studentdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.students.index') }}">Manage Student</a></li>
                <li><a href="{{ route('admin.answers.index') }}">Questions Answer</a></li>
            </ul>
        </li>
        @role('admin')
        <li><a href="#admindropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i> Admins </a>
            <ul id="admindropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.admins.index') }}">Manage Admins</a></li>
                <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
            </ul>
        </li>
        @endrole

        <li><a href="#coursedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation"></i> Courses </a>
            <ul id="coursedropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.courses.index') }}">Manage Course</a></li>
                <li><a href="{{ route('admin.enrolled.index') }}">Enrolled Courses</a></li>
                <li><a href="{{ route('admin.topics.index') }}">Topics</a></li>
                <li><a href="{{ route('admin.questions.index') }}">Questions</a></li>
                <li><a href="{{ route('admin.choices.index') }}">Choices</a></li>
            </ul>
        </li>

        @role('admin')
        <li><a href="#accountsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i> Accounts </a>
            <ul id="accountsdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Payment</a></li>
                <li><a href="#">Earnings</a></li>
                <li><a href="#">Refunds</a></li>
            </ul>
        </li>
        @endrole
        <li><a href="login.html"> <i class="icon-mail"></i>Contact Messages </a></li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li><a href="#siteinfodropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Site Info </a>
            <ul id="siteinfodropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Logs</a></li>
            </ul>
        </li>
        @role('admin')
        <li> <a href="#"> <i class="fa fa-cog"></i> Settings </a></li>
        @endrole
    </ul>
</nav>
