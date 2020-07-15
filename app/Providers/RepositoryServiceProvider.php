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
            \App\Repository\Project\ProjectRepo::class,
            \App\Repository\Project\Eloquent\ProjectEloquent::class
        );

        $this->app->bind(
            \App\Repository\Blog\BlogRepo::class,
            \App\Repository\Blog\Eloquent\BlogEloquent::class
        );

        $this->app->bind(
            \App\Repository\Category\CategoryRepo::class,
            \App\Repository\Category\Eloquent\CategoryEloquent::class
        );

        $this->app->bind(
            \App\Repository\SocialMedia\SocialMediaRepo::class,
            \App\Repository\SocialMedia\Eloquent\SocialMediaEloquent::class
        );
    }
}
