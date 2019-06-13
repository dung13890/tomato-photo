<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],
        'category' => [
            \App\Contracts\Repositories\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class,
        ],
        'post' => [
            \App\Contracts\Repositories\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],
        'slide' => [
            \App\Contracts\Repositories\SlideRepository::class,
            \App\Repositories\SlideRepositoryEloquent::class,
        ],
        'menu' => [
            \App\Contracts\Repositories\MenuRepository::class,
            \App\Repositories\MenuRepositoryEloquent::class,
        ],
        'contact' => [
            \App\Contracts\Repositories\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class,
        ],
        'product' => [
            \App\Contracts\Repositories\ProductRepository::class,
            \App\Repositories\ProductRepositoryEloquent::class,
        ],
        'collection' => [
            \App\Contracts\Repositories\CollectionRepository::class,
            \App\Repositories\CollectionRepositoryEloquent::class,
        ],
        'config' => [
            \App\Contracts\Repositories\ConfigRepository::class,
            \App\Repositories\ConfigRepositoryEloquent::class,
        ],
        'pricing' => [
            \App\Contracts\Repositories\PricingRepository::class,
            \App\Repositories\PricingRepositoryEloquent::class,
        ],
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public static function resolve($name)
    {
        $repository = static::$repositories[$name];

        return app($repository[0]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }

        AliasLoader::getInstance()->alias('Repo', static::class);
    }
}
