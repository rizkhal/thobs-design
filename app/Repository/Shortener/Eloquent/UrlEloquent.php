<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Models\Url;
use App\Repository\Shortener\UrlRepo;

class UrlEloquent implements UrlRepo
{
    protected $model;

    public function __construct(Url $url)
    {
        $this->model = $url;
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
        return Url::create([
            'user_id'    => $id,
            'long_url'   => $data['long_url'],
            'meta_title' => $data['long_url'],
            'keyword'    => $data['custom_key'] ?? $this->model->randomKey(),
            'is_custom'  => $data['custom_key'] ? 1 : 0,
            'ip'         => request()->ip(),
        ]);
    }
}
