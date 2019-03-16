<?php

namespace Studihub\Http\Controllers\Student;

class StudentDashboardController extends StudentBaseController
{


    /**
     * StudentDashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        return view('student.index');
    }
}
