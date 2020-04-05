<?php

namespace App\Providers;

use App\Facade\File\UploadService;
use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('upload', function() {
            return new UploadService;
        });
    }

    public function boot()
    {

    }
}