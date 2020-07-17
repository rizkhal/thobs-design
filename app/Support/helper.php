<?php

declare (strict_types = 1);

use App\Constants\Platform;
use Illuminate\Support\Facades\Auth;

if (!function_exists('social_render')) {
    /**
     * Get the social name
     *
     * @param  int    $platform
     * @return string
     */
    function social_render(int $platform): string
    {
        return strtolower(Platform::label($platform));
    }
}

if (!function_exists('notice')) {
    /**
     * Notification
     *
     * @param  string $type
     * @param  string $message
     * @return void
     */
    function notice(string $type, string $message): void
    {
        $notices = session()->get('notice');
        if (!is_array($notices)) {
            $notices = [];
        }

        array_push($notices, [
            'type'    => $type,
            'message' => $message,
        ]);

        session()->put('notice', $notices);
    }
}

if (!function_exists("active")) {
    /**
     * Active url
     *
     * @param  array|string  $path
     * @param  string  $active
     * @return string
     */
    function active($path, string $active = "active"): string
    {
        return call_user_func_array("Request::is", (array) $path) ? $active : '';
    }
}

if (!function_exists('convert_date')) {
    /**
     * Convert date
     *
     * @param  string $date date
     * @return string
     */
    function convert_date(string $date): string
    {
        return date('d F Y', strtotime($date));
    }
}

if (!function_exists('logged_in_user')) {
    /**
     * Auth user
     *
     * @return object
     */
    function logged_in_user(): object
    {
        return Auth::user();
    }
}
