<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return view('backend::shortener.index');
    }

    public function create()
    {
        return view('backend::shortener.create');
    }

    public function store(UrlRequest $request)
    {
        dd($request->data());
    }
}
