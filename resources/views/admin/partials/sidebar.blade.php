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
        <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">Mark Stephen</h1>
            <p>Super Admin</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.index') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="tables.html"> <i class="fa fa-users"></i>  Students </a></li>
        <li><a href="charts.html"> <i class="fa fa-group"></i> Teachers</a></li>
        <li><a href="forms.html"> <i class="icon-user"></i> Admins </a></li>

        <li><a href="#coursedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation"></i> Courses </a>
            <ul id="coursedropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.courses.index') }}">Manage Course</a></li>
                <li><a href="{{ route('admin.topics.index') }}">Topics</a></li>
                <li><a href="{{ route('admin.questions.index') }}">Questions</a></li>
            </ul>
        </li>
        <li><a href="#accountsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i> Accounts </a>
            <ul id="accountsdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Payment</a></li>
                <li><a href="#">Earnings</a></li>
                <li><a href="#">Refunds</a></li>
            </ul>
        </li>
        <li><a href="#siteinfodropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Site Info </a>
            <ul id="siteinfodropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Logs</a></li>
            </ul>
        </li>
        <li><a href="login.html"> <i class="icon-mail"></i>Contact Messages </a></li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="fa fa-cog"></i> Settings </a></li>
    </ul>
</nav>
