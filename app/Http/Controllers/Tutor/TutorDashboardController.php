<?php

namespace Studihub\Http\Controllers\Tutor;

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
