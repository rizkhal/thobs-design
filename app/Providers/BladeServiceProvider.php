<?php

namespace App\Providers;

use App\Repository\Setting\SettingRepo;
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
    public function boot(): void
    {
        $this
            ->components()
            ->loadViews()
            ->shareViews()
            ->directive();
    }

    /**
     * Define layout for backend blade view
     *
     * @return self
     */
    private function components(): self
    {
        Blade::component('layouts.back.app', 'back-layout');
        Blade::component('layouts.front.app', 'front-layout');

        return $this;
    }

    /**
     * Load backend view blade
     *
     * @return self
     */
    private function loadViews(): self
    {
        $this->loadViewsFrom(resource_path('views/back'), 'backend');
        $this->loadViewsFrom(resource_path('views/front'), 'frontend');
        $this->loadViewsFrom(resource_path('views/back/shortener/stats'), 'chart-template');

        return $this;
    }

    /**
     * Share socials data to views
     *
     * @return self
     */
    private function shareViews(): self
    {
        $socials = resolve(SocialMediaRepo::class)->all();
        $setting = resolve(SettingRepo::class)->all();

        View::composer([
            'front.about.index',
            'front.contact.index',
            'layouts.front.partials.header',
            'layouts.front.partials.footer',
        ], function ($view) use ($socials, $setting) {
            $view->with([
                'socials' => $socials,
                'route'   => $setting['about']->route,
            ]);
        });

        return $this;
    }

    /**
     * Directive for ids identification
     *
     * @return self
     */
    private function directive(): self
    {
        Blade::directive('update', function ($id) {
            if (is_null($id)) {
                return "<input type='hidden' name='id'/>";
            }

            return "<input type='hidden' name='id' value='{$id}'/>";
        });

        return $this;
    }
}
