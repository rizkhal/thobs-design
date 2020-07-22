<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Repository\Shortener\Eloquent\UrlRedirectService;
use Illuminate\Support\Facades\DB;

class UrlRedirectController extends Controller
{
    /**
     * Handle the logging of the URL and redirect the user to the intended
     * long URL.
     *
     * @param UrlRedirectionService $service
     * @param string                $key
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UrlRedirectService $service, string $key)
    {
        return DB::transaction(function () use ($service, $key) {
            $url = Url::whereKeyword($key)->firstOrFail();
            return $service->handleHttpRedirect($url);
        });
    }
}
