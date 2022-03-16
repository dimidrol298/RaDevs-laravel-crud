<?php

namespace App\Repository;

use App\Models\Role;
use App\Models\User;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    /**
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return User::where('email', '!=' , 'admin@example.com')->latest()->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllUsersForTests(): \Illuminate\Support\Collection
    {
        return User::where('email', '!=' , 'admin@example.com')->get(['id', 'name']);
    }

    /**
     * @param $id
     * @return \App\Models\User
     */
    public function getUserById($id): User
    {
        return User::find($id);
    }

    /**
     * @param array $request
     * @param null $id
     * @return bool
     */
    public function createOrUpdate($request = [], $id = null)
    {
        if(is_null($id)) {
            $user = new User();
            $user->password = Hash::make($request->get('password'));
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->assignRole(Role::MANAGER);
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        return $user->save();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        return User::find($id)->delete();
    }
}
