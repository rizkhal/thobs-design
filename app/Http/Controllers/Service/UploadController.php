<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Upload;

class UploadController extends Controller
{
    public function project(Request $request)
    {
        return Upload::from($request->file('file'))
            ->to($request->location)
            ->type('image')
            ->generateName($request->fileName)
            ->return();
    }
}
