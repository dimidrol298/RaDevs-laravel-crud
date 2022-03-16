<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role as SelfRoles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        $role1 = Role::firstOrCreate(['name' => 'admin']);
        $role2 = Role::firstOrCreate(['name' => 'manager']);

        $user = User::where(['email' => 'admin@example.com'])->first();
        if (!isset($user)) {
            // create a demo user
            User::factory()->count(1)->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                // factory default password is 'password'
            ]);

            $user = User::where(['email' => 'admin@example.com'])->first();
            $user->assignRole($role1);
        }
    }
}
