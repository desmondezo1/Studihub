<?php

namespace Studihub\Http\Controllers\Student;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;

class StudentDashboardController extends StudentBaseController
{


    /**
     * StudentDashboardController constructor.
     */
    public function __construct()
    {
    }


    public function index(){
        return view('student.index');
    }
}
