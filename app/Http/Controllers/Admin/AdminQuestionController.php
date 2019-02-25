<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\Question;

class AdminQuestionController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return view('admin.pages.questions.index');
    }

    public function show($slug){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function update(Question $question){

    }

    public function destroy(Question $question){

    }
}
