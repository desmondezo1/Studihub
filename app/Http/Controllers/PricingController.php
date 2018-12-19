<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        return view('pages.layouts.pricing.pricing');
    }
}
