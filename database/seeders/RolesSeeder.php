<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Administrator' => [
                'home',
                'profile.index',
                'profile.edit',
            ],
        ];

        foreach ($roles as $role => $permissions) {
            $getRole = Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
                $getRole->givePermissionTo($permission);
            }
        }
    }
}
