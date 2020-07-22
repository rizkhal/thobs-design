<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Models\Url;
use App\Repository\Shortener\UrlRepo;
use Illuminate\Support\Facades\DB;

class UrlEloquent implements UrlRepo
{
    protected $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    public function countWhereWeek()
    {
        $query = DB::select("
            SELECT COUNT(visits.`id`) AS visit, COUNT(urls.`clicks`) AS clicked, WEEK(urls.`created_at`) AS week
            FROM urls LEFT JOIN visits ON urls.`id` = visits.`url_id`
            GROUP BY WEEK(urls.`created_at`) ORDER BY WEEK(urls.`created_at`) ASC
        ");

        foreach ($query as $key => $value) {
            $week[]   = $value->week;
            $visits[] = $value->visit;
            $clicks[] = $value->clicked;
        }

        return compact('week', 'visits', 'clicks');
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

    /**
     * Find the url
     *
     * @param  string $id
     * @return object
     */
    public function findUrl(string $id): object
    {
        return $this->url->findOrFail($id);
    }

    /**
     * Update the url
     *
     * @param  string $id
     * @param  array  $data
     * @return bool
     */
    public function edit(string $id, array $data): bool
    {
        $url = $this->findUrl($id);

        $title = $this->url->getRemoteTitle($data['long_url']);
        $key   = $data['custom_key'] ?? $this->url->randomKey();

        return $url->update([
            'keyword'    => $key,
            'meta_title' => $title,
            'ip'         => request()->ip(),
            'long_url'   => $data['long_url'],
            'is_custom'  => $data['custom_key'] ? 1 : 0,
        ]);
    }

    /**
     * Delete the url
     *
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        $url = $this->findUrl($id);
        return $url->delete();
    }
}
