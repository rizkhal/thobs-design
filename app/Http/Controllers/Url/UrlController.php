<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Repository\Shortener\UrlRepo;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    protected $urlRepo;

    public function __construct(UrlRepo $url)
    {
        $this->urlRepo = $url;
    }

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
        if ($this->urlRepo->shortenUrl(logged_in_user()->id, $request->data())) {
            notice('success', 'Successfully shortened the url');
            return redirect()->back();
        }

        ddd('aa');
    }
}
