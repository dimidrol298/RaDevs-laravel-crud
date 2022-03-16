<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return bool
     */
    public function view(User $user, Test $test): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return bool
     */
    public function update(User $user, Test $test): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return bool
     */
    public function delete(User $user, Test $test): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return bool
     */
    public function restore(User $user, Test $test): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return bool
     */
    public function forceDelete(User $user, Test $test): bool
    {
        return $user->hasRole(Role::ADMIN);
    }
}
