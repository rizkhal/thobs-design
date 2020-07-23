<?php

declare (strict_types = 1);

use App\Constants\Platform;
use Illuminate\Support\Facades\Auth;

if (!function_exists('numberFormatShort')) {
    /**
     * Convert large positive numbers in to short form like 1K+, 100K+, 199K+,
     * 1M+, 10M+, 1B+ etc.
     * Based on: ({@link https://gist.github.com/RadGH/84edff0cc81e6326029c}).
     *
     * @param int $n
     * @return string
     */
    function numberFormatShort(?float $n): string
    {
        if ($n >= 0 && $n < pow(10, 3)) {
            // 1 - 999
            $nFormat = floor($n);
            $suffix  = '';
        } elseif ($n >= pow(10, 3) && $n < pow(10, 6)) {
            // 1k-999k
            $nFormat = numbPrec($n / pow(10, 3));
            $suffix  = 'K+';

            if (($n / pow(10, 3) == 1) || ($n / pow(10, 4) == 1) || ($n / pow(10, 5) == 1)) {
                $suffix = 'K';
            }
        } elseif ($n >= pow(10, 6) && $n < pow(10, 9)) {
            // 1m-999m
            $nFormat = numbPrec($n / pow(10, 6));
            $suffix  = 'M+';

            if (($n / pow(10, 6) == 1) || ($n / pow(10, 7) == 1) || ($n / pow(10, 8) == 1)) {
                $suffix = 'M';
            }
        } elseif ($n >= pow(10, 9) && $n < pow(10, 12)) {
            // 1b-999b
            $nFormat = numbPrec($n / pow(10, 9));
            $suffix  = 'B+';

            if (($n / pow(10, 9) == 1) || ($n / pow(10, 10) == 1) || ($n / pow(10, 11) == 1)) {
                $suffix = 'B';
            }
        } elseif ($n >= pow(10, 12)) {
            // 1t+
            $nFormat = numbPrec($n / pow(10, 12));
            $suffix  = 'T+';

            if (($n / pow(10, 12) == 1) || ($n / pow(10, 13) == 1) || ($n / pow(10, 14) == 1)) {
                $suffix = 'T';
            }
        }

        return !empty($nFormat . $suffix) ? $nFormat . $suffix : 0;
    }
}

if (!function_exists('numbPrec')) {
    /**
     * Alternative to make number_format() not to round numbers up.
     *
     * Based on: ({@link https://stackoverflow.com/q/3833137}).
     *
     * @param number $number
     * @param int    $precision
     * @return float
     */
    function numbPrec($number, $precision = 2): float
    {
        return floor($number * pow(10, $precision)) / pow(10, $precision);
    }
}

if (!function_exists('urlRemoveScheme')) {
    /**
     * Remove url scheme
     *
     * @param  string|array $value
     * @return string|array
     */
    function urlRemoveScheme($value)
    {
        return str_replace([
            'http://',
            'https://',
            'www.',
        ], '', $value);
    }
}

if (!function_exists('urlConfig')) {
    /**
     * urlConfig('option') is equal to config('shortener.option').
     *
     * @param string $value
     * @return mixed
     */
    function urlConfig(string $value)
    {
        return config('shortener.' . $value);
    }
}

if (!function_exists('background_url')) {
    /**
     * Simple accessor for backgroud
     *
     * @param  string $filename
     * @return string
     */
    function background_url(string $filename): string
    {
        if (!is_null($filename)) {
            $file = asset('storage/uploads/setting/' . $filename);
            if (!empty($file)) {
                return $file;
            }
        }

        return asset('images/about.png');
    }
}

if (!function_exists('profile_picture_url')) {
    /**
     * Get profile picture
     *
     * @param  string $filename
     * @return string
     */
    function profile_picture_url($filename): string
    {
        if (!is_null($filename)) {
            $file = asset('storage/uploads/users/' . $filename);
            if (!empty($file)) {
                return $file;
            }
        }

        return asset('images/user.png');
    }
}

if (!function_exists('market_time')) {
    /**
     * Fix market time
     *
     * @param  string $time
     * @return string
     */
    function market_time($time): string
    {
        return date('H:i', strtotime($time));
    }
}

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
