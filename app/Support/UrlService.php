<?php

declare (strict_types = 1);

namespace App\Support;

use App\Models\Url;

class UrlService
{
    protected $url;

    public function __construct()
    {
        $this->url = new Url;
    }
}
