<?php

namespace StudiHUB\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function about(){
        return view('about.about')->with('name','Desmond');
    }
}
