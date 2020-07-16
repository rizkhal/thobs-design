<?php

namespace App\Providers;

use App\Repository\SocialMedia\SocialMediaRepo;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        $this->components()->loadViews()->shareViews();
    }

    private function components()
    {
        Blade::component('layouts.back.app', 'back-layout');
        Blade::component('layouts.front.app', 'front-layout');

        return $this;
    }

    private function loadViews()
    {
        $this->loadViewsFrom(resource_path('views/back'), 'backend');
        $this->loadViewsFrom(resource_path('views/front'), 'frontend');

        return $this;
    }

    private function shareViews()
    {
        $socials = resolve(SocialMediaRepo::class)->all();

        View::composer([
            'layouts.front.partials.header',
            'layouts.front.partials.footer',
        ], function ($view) use ($socials) {
            $view->with('socials', $socials);
        });

        return $this;
    }
}
