<?php

namespace Database\Seeders;

use App\Models\Router;
use Illuminate\Database\Seeder;

class RouterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Router::create([
            'name' => 'Type 1',
            'number' => '123456',
        ]);

        Router::create([
            'name' => 'Type 2',
            'number' => '912321',
        ]);

        Router::create([
            'name' => 'Type 1',
            'number' => '823211',
        ]);
    }
}
