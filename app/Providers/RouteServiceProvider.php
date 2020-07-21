<?php

declare (strict_types = 1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * This namespace is applied url shortener
     *
     * @var string
     */
    protected $urlNamespace = 'App\Http\Controllers\Url';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes()
            ->mapApiRoutes()
            ->mapUrlShortenerRoutes();
    }

    /**
     * Define url shortener group
     * 
     * @return self
     */
    protected function mapUrlShortenerRoutes(): self
    {
        Route::middleware('web')
            ->namespace($this->urlNamespace)
            ->group(base_path('routes/shortener.php'));

        return $this;
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return self
     */
    protected function mapWebRoutes(): self
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        return $this;
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return self
     */
    protected function mapApiRoutes(): self
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        return $this;
    }
}
