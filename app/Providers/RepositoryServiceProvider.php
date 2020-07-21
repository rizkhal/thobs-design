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
            \App\Repository\User\UserRepo::class,
            \App\Repository\User\Eloquent\UserEloquent::class
        );

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

        $this->app->bind(
            \App\Repository\Setting\SettingRepo::class,
            \App\Repository\Setting\Eloquent\SettingEloquent::class
        );

        $this->app->bind(
            \App\Repository\Shortener\UrlRepo::class,
            \App\Repository\Shortener\Eloquent\UrlEloquent::class
        );
    }
}
