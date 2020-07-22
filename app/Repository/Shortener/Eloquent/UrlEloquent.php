<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Models\Url;
use App\Repository\Shortener\UrlRepo;

class UrlEloquent implements UrlRepo
{
    protected $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * Shorten of the url
     *
     * @param  string $id
     * @param  array  $data
     * @return object
     */
    public function shortenUrl(string $id, array $data): object
    {
        $title = $this->url->getRemoteTitle($data['long_url']);
        $key   = $data['custom_key'] ?? $this->url->randomKey();

        return Url::create([
            'user_id'    => $id,
            'keyword'    => $key,
            'meta_title' => $title,
            'ip'         => request()->ip(),
            'long_url'   => $data['long_url'],
            'is_custom'  => $data['custom_key'] ? 1 : 0,
        ]);
    }
}
