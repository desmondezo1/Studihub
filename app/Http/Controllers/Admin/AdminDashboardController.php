<?php

namespace Studihub\Http\Controllers\Admin;

use Studihub\Http\Controllers\AdminBaseController;

class AdminDashboardController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return view('admin.index');
    }

}
