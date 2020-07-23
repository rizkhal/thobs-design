<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Repository\Shortener\UrlRepo;
use Illuminate\View\View;

class UrlStatsController extends Controller
{
    protected $url;

    public function __construct(UrlRepo $url)
    {
        $this->url = $url;
    }

    public function __invoke(): View
    {
        return view('backend::shortener.stats.index', [
            'charts'   => $this->url->bannerChart(),
            'clicks'   => $this->url->allCount()['clicks'],
            'shorts'   => $this->url->allCount()['shorts'],
            'capacity' => $this->url->allCount()['capacity'],
            'overview' => $this->url->allCount()['overview'],
        ]);
    }
}
