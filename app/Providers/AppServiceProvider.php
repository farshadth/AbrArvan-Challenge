<?php

namespace App\Providers;

use App\Repositories\GiftCodeRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('WalletRepository', WalletRepository::class);
        $this->app->bind('GiftCodeRepository', GiftCodeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
