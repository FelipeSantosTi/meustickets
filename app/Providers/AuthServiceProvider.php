<?php

namespace App\Providers;

use App\Permission;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                if ($user->access_id == '1') {
                    return $user->adminPermission($permission->name);
                }

                if ($user->access_id == '2') {
                    return $user->evPermission($permission->name);
                }

                if ($user->access_id == '3') {
                    return $user->acdPermission($permission->name);
                }
            });
        }

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
