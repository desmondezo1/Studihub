<?php

namespace Studihub\Http\Controllers;

use Studihub\Models\Course;
use Studihub\Models\State;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where("hidden", false)->get();
        return view('index',compact('courses'));
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function privacy(){
        return view('pages.privacy-policy');
    }

    public function terms(){
        return view('pages.terms-and-conditions');
    }


}
