<?php

namespace Database\Seeders;

use App\Models\LineType;
use Illuminate\Database\Seeder;

class LineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LineType::create([
            'name' => 'msan',
        ]);

        LineType::create([
            'name' => 'fiber',
        ]);

        LineType::create([
            'name' => '4G هوائي',
        ]);

        LineType::create([
            'name' => 'L.L',
        ]);
    }
}
