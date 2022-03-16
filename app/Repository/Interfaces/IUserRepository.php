<?php

namespace App\Repository\Interfaces;

use App\Models\User;

interface IUserRepository
{
    public function getAllUsers();

    public function getAllUsersForTests();

    public function getUserById($id);

    public function createOrUpdate( $request = [], int $id = null);

    public function deleteUser(int $id);


}
