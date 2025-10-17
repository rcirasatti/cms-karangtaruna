<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // Share kontak data to all views that use layouts.app
        View::composer('layouts.app', function ($view) {
            $kontak = Kontak::first();
            $view->with('kontak', $kontak);
        });
    }
}
