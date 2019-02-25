<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\Course;

class PricingController extends Controller
{
    public function index(Request $request)
    {
        $id = session()->get('id');
        if ($id  != null){
            $course = Course::find($id);
            return view('pages.layouts.pricing.pricing')->with('topic', $course);
        }
        return abort(404);
    }
}
