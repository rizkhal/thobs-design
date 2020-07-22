<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Models\Url;

class UrlStatsController extends Controller
{
    public function __invoke(Url $url)
    {
        return view('backend::shortener.stats', [
            'keyCapacity'   => $url->keyCapacity(),
            'keyRemaining'  => $url->keyRemaining(),
            'shortUrlCount' => $url->shortUrlCount(),
            'clickCount'    => $url->clickCount(),
        ]);
    }
}
