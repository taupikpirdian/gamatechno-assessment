<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AccountRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
