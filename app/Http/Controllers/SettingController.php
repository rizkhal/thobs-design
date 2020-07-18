<?php

declare (strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function pages()
    {
        return view('backend::setting.index');
    }

    public function contact(ContactRequest $request)
    {
        if (! $request->has('contact')) {
            // /
        }
    }

    /**
     * Store or update the data of about page
     * 
     * @param  AboutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function about(AboutRequest $request)
    {
        if (! $request->has('about')) {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }
}
