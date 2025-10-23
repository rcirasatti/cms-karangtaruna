<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Kontak;
use App\Models\Hero;
use App\Models\Profile;

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

        // Share kontak and navbar data to all views (only in HTTP requests, not console commands)
        if (!app()->runningInConsole()) {
            View::share('kontak', Kontak::first());
            View::share('navbar', Hero::first());
            View::share('profil', Profile::first());
        }
    }
}
