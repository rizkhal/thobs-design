<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Charts\UrlChartBuilder;
use App\Models\Url;
use App\Repository\Shortener\UrlRepo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlEloquent implements UrlRepo
{
    protected $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * Count all clicked and visits
     *
     * @return array
     */
    public function allCount(): array
    {
        $query = DB::select("
                    SELECT 
                        MIN(`created_at`) AS first,
                        MAX(`created_at`) AS latest
                    FROM
                        `urls`")[0];

        return [
            'clicks'   => $this->url->clickCount(),
            'shorts'   => $this->url->shortUrlCount(),
            'capacity' => $this->url->keyCapacity(),
            'overview' => $query,
        ];
    }

    /**
     * Line charts clicks and redirect
     *
     * @return object
     */
    public function bannerChart(): object
    {
        $template = [
            'backgroundColor'           => "rgba(0, 129, 194, 0.31)",
            'borderColor'               => "rgba(0, 129, 194, 0.7)",
            "pointBorderColor"          => "rgba(0, 129, 194, 0.7)",
            "pointBackgroundColor"      => "rgba(0, 129, 194, 0.7)",
            "pointHoverBackgroundColor" => "#fff",
            "pointHoverBorderColor"     => "rgba(220,220,220,1)",
        ];

        $query = DB::select("
            SELECT COUNT(urls.`clicks`) AS click, WEEK(urls.`created_at`) AS week
            FROM urls
            GROUP BY WEEK(urls.`created_at`) ORDER BY WEEK(urls.`created_at`) DESC
        ");

        for ($i = 0; $i < count($query); $i++) {
            $clicks[] = $query[$i]->click;
            $labels[] = "Week " . $query[$i]->week;
        }

        $data[] = array_merge($template, ["data" => array_reverse($clicks)], ["label" => "Click and Redirect"]);

        return $this->charts("Click and Redirect in Week", array_reverse($labels), $data);
    }

    /**
     * Charts helper
     *
     * @param  string $title
     * @param  array  $labels
     * @param  array  $data
     * @param  string $type
     * @return object
     */
    public function charts(string $title, array $labels, array $data, string $type = 'line'): object
    {
        return (new UrlChartBuilder())
            ->name(Str::camel($title))
            ->type($type)
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets($data)
            ->options([
                'title' => [
                    'display' => true,
                    'text'    => $title,
                ],
            ]);
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
