<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //admin roles and permissions will be added here.
    public function __construct()
    {

    }
}
