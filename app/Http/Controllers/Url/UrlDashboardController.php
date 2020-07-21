<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UrlDashboardController extends Controller
{
    public function index()
    {
        return view('backend::shortener.index');
    }
}
