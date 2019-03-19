<?php

namespace Studihub\Http\Controllers\Admin;

use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\Answer;

class AdminStudentAnswerController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $answers = Answer::with(['student','question','choice'])->get();
        dd($answers);
        return view('admin.pages.students.answers.index',compact('answers'));
    }

    public function show(Answer $answer){
        return view('admin.pages.students.answers.show',compact('answer'));
    }


    public function chart(){
        return back();
    }
}
