<?php

declare (strict_types = 1);

namespace App\Repository\Shortener\Eloquent;

use App\Models\Url;
use App\Models\Visit;
use App\Repository\Shortener\Eloquent\UrlEloquent;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\IpUtils;

class UrlRedirectService
{
    /**
     * @var Agent|null
     */
    private $agent;

    /**
     * @var string
     */
    protected $url;

    public function __construct(Agent $agent = null, UrlEloquent $url)
    {
        $this->url   = $url;
        $this->agent = $agent ?? new Agent;
    }

    /**
     * Handle the HTTP redirect and return the redirect response.
     *
     * Redirect client to an existing short URL (no check performed) and
     * execute tasks update clicks for short URL.
     *
     * @param Url $url
     * @return RedirectResponse
     */
    public function handleHttpRedirect(Url $url)
    {
        $url->increment('clicks');
        $this->storeVisitStat(
            $url,
            $url->ipToCountry(
                $this->anonymizeIp(request()->ip())
            )
        );

        $headers = [
            'Cache-Control' => sprintf('private,max-age=%s', urlConfig('redirect_cache_lifetime')),
        ];

        return redirect()->away($url->long_url, urlConfig('redirect_status_code'), $headers);
    }

    /**
     * Anonymize an IPv4 or IPv6 address.
     *
     * @param string $address
     * @return string
     */
    private function anonymizeIp($address)
    {
        if (urlConfig('anonymize_ip_addr') == false) {
            return $address;
        }

        return IPUtils::anonymize($address);
    }

    private function storeVisitStat(Url $url, array $countries)
    {
        Visit::create([
            'url_id'           => $url->id,
            'referer'          => request()->server('HTTP_REFERER') ?? null,
            'ip'               => $this->anonymizeIp(request()->ip()),
            'device'           => $this->agent->device(),
            'platform'         => $this->agent->platform(),
            'platform_version' => $this->agent->version($this->agent->platform()),
            'browser'          => $this->agent->browser(),
            'browser_version'  => $this->agent->version($this->agent->browser()),
            'country'          => $countries['countryCode'],
            'country_full'     => $countries['countryName'],
        ]);
    }
}
