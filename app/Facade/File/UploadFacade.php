<?php

namespace App\Facade\File;

use Illuminate\Support\Facades\Facade;

class UploadFacade extends Facade
{
	static protected function getFacadeAccessor()
	{
		return 'upload';
	}
}