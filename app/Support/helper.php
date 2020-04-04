<?php

if (! function_exists("is_active")) {
	/**
	 * Active url
	 * @param  string  $path
	 * @param  string  $active
	 * @return boolean
	 */
	function is_active($path, $active = "active")
	{
		return call_user_func_array("Request::is", (array) $path) ? $active : '';
	}
}