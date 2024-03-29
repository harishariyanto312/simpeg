<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->group->is_restricted == 'N') {
                return true;
            }
        });

        Gate::define('permission', function (User $user, $key) {
            $permissions = $user->group->permissions();
            return in_array($key, $permissions);
        });

        Gate::define('permission_ownership', function (User $user, $key_owned, $key_all, $resource_owner_id) {
            $permissions = $user->group->permissions();
            
            if (in_array($key_owned, $permissions) && $user->id == $resource_owner_id) {
                return true;
            }

            if (in_array($key_all, $permissions)) {
                return true;
            }

            return false;
        });
    }
}
