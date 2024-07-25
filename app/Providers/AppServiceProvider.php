<?php

namespace App\Providers;

use App\Repository\Impl\OrderDetailsRepo;
use App\Repository\Impl\OrderRepo;
use App\Repository\IOrderDetailsRepo;
use App\Repository\IOrderRepo;
use App\Services\Impl\OrderDetailsService;
use App\Services\IOrderDetailsService;
use App\Services\IOrderService;
use App\Services\Impl\OrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IOrderRepo::class, OrderRepo::class);
        $this->app->bind(IOrderDetailsRepo::class, OrderDetailsRepo::class);
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IOrderDetailsService::class, OrderDetailsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
