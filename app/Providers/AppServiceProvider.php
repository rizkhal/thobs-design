<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(BladeServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootDateConfig();
    }

    /**
     * Boot set date time locale
     *
     * @return self
     */
    public function bootDateConfig(): self
    {
        Carbon::setLocale(env('LOCALE', 'id'));
        date_default_timezone_set('Asia/Makassar');

        return $this;
    }
}
