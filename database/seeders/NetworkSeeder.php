<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Network::create([
            'name' => 'We'
        ]);

        Network::create([
            'name' => 'Vodafone',
        ]);

        Network::create([
            'name' => 'Etisalat',
        ]);

        Network::create([
            'name' => 'Orange',
        ]);
    }
}
