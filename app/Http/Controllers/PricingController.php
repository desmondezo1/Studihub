<?php

namespace StudiHUB\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    //
    public function index()
    {
        # code... 
        return view('pricing.pricing')->with('name','pricing');
    }
   
}
