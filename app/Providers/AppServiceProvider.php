<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Contracts\Repositories\ConfigRepository;
use App\Contracts\Repositories\MenuRepository;
use App\Contracts\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('REDIRECT_HTTPS')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'dev') {
            $this->app->register(\Lord\Laroute\LarouteServiceProvider::class);
            $this->app->register(\Mariuzzo\LaravelJsLocalization\LaravelJsLocalizationServiceProvider::class);
        }

        $this->composers();
    }

    public function composers()
    {
        view()->composer('backend.*', function ($view) {
            $view->with('me', \Auth::guard('backend')->user());
        });

        view()->composer('frontend.*', function ($view) {
            $view->with('configs', Cache::remember('configs', 60, function () {
                return app(ConfigRepository::class)->getData(['value', 'key'])->pluck('value', 'key');
            }));
            $view->with('__menus', Cache::remember('__menus', 60, function () {
                return app(MenuRepository::class)->getData(['id', 'name', 'url', 'parent_id']);
            }));
            $view->with('__categories', Cache::remember('__categories', 60, function () {
                return app(CategoryRepository::class)->getRandom(5, ['name', 'slug']);
            }));
        });
    }
}
