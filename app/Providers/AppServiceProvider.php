<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Kontak;

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
        // Force HTTPS in production (Railway uses HTTPS)
        if (env('APP_ENV') === 'production' && env('APP_DEBUG') === false) {
            URL::forceScheme('https');
        }

        // Share kontak data to all views
        View::share('kontak', Kontak::first());
    }
}
