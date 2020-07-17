<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function frontIndex()
    {
        return view('front.contact.index');
    }
}
