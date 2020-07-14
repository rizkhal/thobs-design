<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('layouts.app', 'app-layout');
        $this->loadViewsFrom(resource_path('views/back'), 'backend');
        $this->loadViewsFrom(resource_path('views/front'), 'frontend');
    }
}
