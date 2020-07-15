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
        Blade::component('layouts.back.app', 'back-layout');
        Blade::component('layouts.front.app', 'front-layout');
        
        $this->loadViewsFrom(resource_path('views/back'), 'backend');
        $this->loadViewsFrom(resource_path('views/front'), 'frontend');
    }
}
