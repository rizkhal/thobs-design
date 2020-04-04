<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
    	return view('front.index');
    }

    public function about()
    {
    	# code...
    }

    public function contact()
    {
    	# code...
    }
}
