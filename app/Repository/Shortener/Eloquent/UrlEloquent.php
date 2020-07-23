<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Charts\UrlChartBuilder;
use App\Models\Url;
use App\Repository\Shortener\UrlRepo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UrlEloquent implements UrlRepo
{
    protected $url, $builder;

    public function __construct(Url $url)
    {
        $this->url     = $url;
        $this->builder = new UrlChartBuilder;
    }

    public function countWhereWeek()
    {
        //
    }

    public function countAllPeriod()
    {
        return [
            'clickCount' => $this->url->clickCount(),
            'shortCount' => $this->url->shortUrlCount(),
        ];
    }

    public function bannerChart()
    {
        $query = DB::select("
            SELECT COUNT(visits.`id`) AS visit, COUNT(urls.`clicks`) AS clicked, WEEK(urls.`created_at`) AS week
            FROM urls LEFT JOIN visits ON urls.`id` = visits.`url_id`
            GROUP BY WEEK(urls.`created_at`) ORDER BY WEEK(urls.`created_at`) DESC
        ");

        for ($i = 0; $i < count($query); $i++) {
            $labels[]  = $query[$i]->week;
            $visited[] = $query[$i]->visit;
            $clicked[] = $query[$i]->clicked;
        }

        return $this->builder
            ->name('bannerChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(array_reverse($labels))
            ->datasets([
                [
                    "label"                     => "Totoal Click",
                    'backgroundColor'           => "rgba(38, 185, 154, 0.31)",
                    'borderColor'               => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor"          => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor"      => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor"     => "rgba(220,220,220,1)",
                    'data'                      => array_reverse($clicked),
                ],
                [
                    "label"                     => "Total Visit",
                    'backgroundColor'           => "rgba(38, 185, 154, 0.31)",
                    'borderColor'               => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor"          => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor"      => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor"     => "rgba(220,220,220,1)",
                    'data'                      => array_reverse($visited),
                ],
            ])
            ->options([
                'title' => [
                    'display' => true,
                    'text'    => 'Total Click and Visit in Week',
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
