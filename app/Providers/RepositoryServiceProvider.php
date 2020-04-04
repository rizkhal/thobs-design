<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repository\Subscriber\SubscriberRepo::class,
            \App\Repository\Subscriber\Eloquent\SubscriberEloquent::class
        );

        $this->app->bind(
            \App\Repository\Order\OrderRepo::class,
            \App\Repository\Order\Eloquent\OrderEloquent::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
