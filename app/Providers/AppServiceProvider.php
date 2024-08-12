<?php

namespace App\Providers;

use App\Services\MenuService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
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
                // Instancie o MenuService aqui
                $menuService = app(MenuService::class);

                $user = Auth::user();
                $menuItems = $menuService->getMenuForUser($user);
                $view->with('menuItems', $menuItems);
                $view->with('layout', 'components.layouts.dashboard');
            } else {
                $view->with('layout', 'components.layouts.app');
            }
        });
    }
}

