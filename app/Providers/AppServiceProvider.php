<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\RepositoriesContracts\OrderRepositoryInterface::class, \App\Repositories\OrderRepository::class);
        $this->app->bind(\App\RepositoriesContracts\ClientRepositoryInterface::class,\App\Repositories\ClientRepository::class);
        $this->app->bind(\App\RepositoriesContracts\ItemRepositoryInterface::class,\App\Repositories\ItemRepository::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
