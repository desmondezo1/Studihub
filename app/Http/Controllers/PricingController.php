<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\Topic;

class PricingController extends Controller
{
    public function index(Request $request)
    {
        $slug = session()->get('slug');
        if ($slug  != null){
            $topic = Topic::findBySlug($slug);
            return view('pages.layouts.pricing.pricing')->with('topic', $topic);
        }
        return abort(404);
    }
}
