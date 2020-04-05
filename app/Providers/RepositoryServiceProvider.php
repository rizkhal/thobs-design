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
            \App\Repository\Appointment\AppointmentRepo::class,
            \App\Repository\Appointment\Eloquent\AppointmentEloquent::class
        );

        $this->app->bind(
            \App\Repository\Project\ProjectRepo::class,
            \App\Repository\Project\Eloquent\ProjectEloquent::class
        );

        $this->app->bind(
            \App\Repository\Category\CategoryRepo::class,
            \App\Repository\Category\Eloquent\CategoryEloquent::class
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
