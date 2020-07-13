<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('notice')) {
	/**
	 * Notification
	 * @param  string $type
	 * @param  string $message
	 * @return array
	 */
	function notice($type, $message)
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

if (! function_exists("active")) {
	/**
	 * Active url
	 * @param  string  $path
	 * @param  string  $active
	 * @return boolean
	 */
	function active($path, $active = "active")
	{
		return call_user_func_array("Request::is", (array) $path) ? $active : '';
	}
}

if (! function_exists('convert_date')) {
	/**
	 * Convert date
	 * @param  string $date date
	 * @return string
	 */
	function convert_date($date)
	{
		return date('d F Y', strtotime($date));
	}
}

if (! function_exists('logged_in_user')) {
	/**
	 * Auth user
	 * @return
	 */
	function logged_in_user()
	{
		return Auth::user();
	}
}
