<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email',"admin@admin.com")->first();
        if(!is_null($admin)) {
            $admin->update([
                'password'      => \Hash::make("admin@123456"),
            ]);
        } else {
            $admin = User::create([
                'name'          => "admin",
                'email'         => "admin@admin.com",
                'password'      => \Hash::make("admin@123456"),
            ]);
        }
        $admin->assignRole(Role::where("name","Administrator")->first());
    }
}
