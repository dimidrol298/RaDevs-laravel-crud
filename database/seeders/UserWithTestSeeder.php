<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UserWithTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function(\App\Models\User $user) {
            $user->assignRole(Role::MANAGER);
            \App\Models\Test::factory(1)->create(['user_id' => $user->id]);
        });
    }
}
