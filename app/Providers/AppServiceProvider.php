<?php

namespace App\Providers;

use App\Repository\IClientRepo;
use App\Repository\IMenuItemRepo;
use App\Repository\Impl\ClientRepo;
use App\Repository\Impl\MenuItemRepo;
use App\Repository\Impl\OrderDetailsRepo;
use App\Repository\Impl\OrderRepo;
use App\Repository\IOrderDetailsRepo;
use App\Repository\IOrderRepo;
use App\Services\IClientService;
use App\Services\IMenuItemService;
use App\Services\Impl\ClientService;
use App\Services\Impl\MenuItemService;
use App\Services\Impl\OrderDetailsService;
use App\Services\IOrderDetailsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //todo:phelo check all dependencies at controllers, services
        //it should depend on interface not on class
        $this->app->bind(IOrderRepo::class, OrderRepo::class);
        $this->app->bind(IOrderDetailsRepo::class, OrderDetailsRepo::class);
        $this->app->bind(IMenuItemRepo::class, MenuItemRepo::class);
        $this->app->bind(IClientRepo::class, ClientRepo::class);
        $this->app->bind(IOrderDetailsService::class, OrderDetailsService::class);
        $this->app->bind(IClientService::class, ClientService::class);
        $this->app->bind(IMenuItemService::class, MenuItemService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
