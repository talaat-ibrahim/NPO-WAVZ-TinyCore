<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $role = Role::where('name', 'Administrator')->first();
        if(!$role){
            $role = Role::updateOrCreate([
                'name'  => 'Administrator',
                'guard_name' => 'web'
            ]);
        }
        $permission = Permission::all();
        $role->syncPermissions($permission);
        
    }
}
