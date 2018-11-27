<?php

namespace StudiHUB\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    //Learn controller to get and display topic video and notes to the user

    public function index()
    {
        # code...

        return view('course-content.show-topic')->with('name','topic_name');
    }

}
