<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;

class AdminDashboardController extends AdminBaseController
{


    public function index(){
        return view('admin.index');
    }
}
