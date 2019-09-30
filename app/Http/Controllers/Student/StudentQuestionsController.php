<?php

namespace Studihub\Http\Controllers\Student;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;

class StudentQuestionsController extends StudentBaseController
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index(){

        return view('student.questions.index',compact('questions'));
    }

}
