<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
