<?php

namespace App\Providers;

use App\Services\CartService;
use App\Services\VoucherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() :void
    {
        $this->app->singleton(VoucherService::class, function () {
            return new VoucherService();
        });

        $this->app->singleton(CartService::class, function () {
           return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
