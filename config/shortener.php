<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Unregistered Users Access
    |--------------------------------------------------------------------------
     */

    /**
     * If enabled, unregistered users can use UrlHub to shorten their URL
     * without having to register / login first.
     */
    'guest'                   => env('UH_GUEST', true),

    /**
     * If disabled, every unregistered users can't register.
     */
    'guest_register'          => env('UH_GUEST_REGISTER', true),

    /**
     * Enable/Disable to allow unregistered users see shortened links
     * statistics.
     */
    'guest_show_stat'         => env('UH_GUEST_SHOW_STAT', true),

    /*
    |--------------------------------------------------------------------------
    | Shorten URL
    |--------------------------------------------------------------------------
     */

    /**
     * The expected (and maximum) number of characters in generating unique
     * keyword.
     */
    'hash_length'             => env('HASH_LENGTH', 6), // >= 1

    /**
     * Characters to be used in generating unique keyword. For convenience,
     * currently the allowed characters are only alphanumeric consisting of
     * a limited set of characters belonging to the US-ASCII characters,
     * including digits (0-9), letters (A-Z, a-z).
     */
    'hash_char'               => env(
        'HASH_CHAR',
        'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
    ),

    /**
     * List of non allowed domain.
     *
     * This list is used to prevent shortening of urls that contain one of the
     * domains below.
     */
    'domain_blacklist'        => [
        config('app.url'),
        // 'bit.ly',
    ],

    /**
     * List of reserved URL ending.
     *
     * This keyword has a special meaning in UrlHub. Some of them represent
     * things that look like folder names in public folders. You are free
     * to add keywords that you want to prevent, for example rude words.
     */
    'reserved_keyword'        => [
        'css',
        'images',
        'img',
        'fonts',
        'js',
        'svg',
    ],

    /*
    |--------------------------------------------------------------------------
    | Visiting
    |--------------------------------------------------------------------------
     */

    /**
     * Tells if IP addresses from visitors should be obfuscated before storing
     * them in the database. Default value is true.
     *
     * Careful!
     * Setting this to false will make your UrlHub instance no longer be in
     * compliance with the GDPR and other similar data protection regulations.
     */
    'anonymize_ip_addr'       => env('UH_ANONYMIZE_IP_ADDR', true),

    /**
     * Configure the kind of redirect you want to use for your short URLs. You
     * can either set:
     * - 301 (Default behavior, visitors always hit the server).
     * - 302 (Better for SEO, visitors hit the server the first time and then
     *   cache the redirect).
     *
     * When selecting 301 redirects, you can also configure the time redirects
     * are cached, to mitigate deviations in stats.
     */
    'redirect_status_code'    => env('UH_REDIRECT_STATUS_CODE', 301),

    /**
     * Set the amount of seconds that redirects should be cached when redirect
     * status is 301. Default values is 90.
     */
    'redirect_cache_lifetime' => env('UH_REDIRECT_CACHE_LIFETIME', 90),
];
