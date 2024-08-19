<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-dashboard-usuarios', function ($user) {
            return $user->isAdmin() || $user->isEmpresa();
        });

        Gate::define('edit-dashboard-usuarios', function ($user) {
            return $user->isAdmin();
        });

        // Permissão para visualizar relatórios
        Gate::define('view-reports', function ($user) {
            return $user->isAdmin() || $user->isEmpresa();
        });

        // Permissão para gerenciar perfis
        Gate::define('manage-profile', function ($user) {
            return $user->isFuncionario() || $user->isEmpresa() || $user->isAdmin();
        });
    }
}
