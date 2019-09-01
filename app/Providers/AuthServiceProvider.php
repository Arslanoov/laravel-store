<?php

namespace App\Providers;

use App\Entity\User\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isManager();
        });

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-pages', function (User $user) {
            return $user->isAdmin() || $user->isManager();
        });

        Gate::define('manage-blog', function (User $user) {
            return $user->isAdmin() || $user->isManager();
        });

        Gate::define('manage-shop', function (User $user) {
            return $user->isAdmin() || $user->isManager();
        });
    }
}
