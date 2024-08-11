<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

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
        View::composer('*', function ($view) {
            $currentRoute = Route::current();
            if ($currentRoute && str_starts_with($currentRoute->uri(), 'dashboard')) {
                $view->with('layout', 'components.layouts.dashboard');
            }
            else {
                $view->with('layout', 'components.layouts.app');
            }
        });
    }
}
