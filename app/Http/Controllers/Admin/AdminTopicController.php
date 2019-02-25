<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\Topic;

class AdminTopicController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return view('admin.pages.topics.index');
    }

    public function show($slug){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function update(Topic $topic){

    }

    public function destroy(Topic $topic){

    }
}
