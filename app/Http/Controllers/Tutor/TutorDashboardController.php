<?php

namespace Studihub\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;

class TutorDashboardController extends TutorBaseController
{

    /**
     * StudentDashboardController constructor.
     */
    public function __construct()
    {
    }


    public function index(){
        return view('tutor.index');
    }
}
