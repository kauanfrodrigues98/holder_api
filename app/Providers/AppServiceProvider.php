<?php

namespace App\Providers;

use App\Repository\Transactions\TransactionsRepository;
use App\Repository\Transactions\TransactionsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionsRepositoryInterface::class, TransactionsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
