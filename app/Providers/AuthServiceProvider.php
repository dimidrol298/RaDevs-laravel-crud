<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use App\Policies\TestPolicy;
use App\Policies\UserPolicy;
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
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Test::class => TestPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user) {
            // Let administrators do everything
            if ($user->hasRole(Role::ADMIN) === true) {
                return true;
            }
        });

        $this->registerPolicies();
    }
}
