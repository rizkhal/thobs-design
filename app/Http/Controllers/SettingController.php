<?php

declare (strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Requests\ContactRequest;
use App\Repository\Setting\SettingRepo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(SettingRepo $setting)
    {
        $this->middleware("role:super-admin");

        $this->setting = $setting;
    }

    public function pages()
    {
        return view('backend::setting.index', [
            'setting' => $this->setting->all(),
        ]);
    }

    public function contact(ContactRequest $request)
    {
        if ($request->has('contact')) {
            if ($this->setting->contact($request->data())) {
                notice('success', 'Successfully setting contact pages.');
                return redirect()->back();
            } else {
                notice('danger', 'Something went wrong, please contact the administrator.');
                return redirect()->back();
            }
        } else {
            abort(500);
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
        dd($request->all());
        if ($request->has('about')) {
            if ($this->setting->about($request->data())) {
                notice('success', 'Successfully update the about page.');
                return redirect()->back();
            } else {
                notice('danger', 'Something went wrong, please contact the administrator.');
                return redirect()->back();
            }
        } else {
            abort(500);
        }
    }
}
