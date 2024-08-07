<?php
//-------------------------------------------------
// プロバイダー [AppServiceProvider.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // HTTP通信の暗号化
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
