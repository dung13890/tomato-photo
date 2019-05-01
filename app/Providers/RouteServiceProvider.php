<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('user', function ($id) {
            return \Repo::resolve('user')->findOrFail($id);
        });
        Route::bind('category', function ($id) {
            return \Repo::resolve('category')->findOrFail($id);
        });
        Route::bind('post', function ($id) {
            return \Repo::resolve('post')->findOrFail($id);
        });
        Route::bind('slide', function ($id) {
            return \Repo::resolve('slide')->findOrFail($id);
        });
        Route::bind('menu', function ($id) {
            return \Repo::resolve('menu')->findOrFail($id);
        });
        Route::bind('contact', function ($id) {
            return \Repo::resolve('contact')->findOrFail($id);
        });
        Route::bind('product', function ($id) {
            return \Repo::resolve('product')->findOrFail($id);
        });
        Route::bind('config', function ($id) {
            return \Repo::resolve('config')->findOrFail($id);
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
