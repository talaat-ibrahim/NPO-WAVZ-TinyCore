<?php

namespace Database\Seeders;

use App\Models\BranchLevel;
use Illuminate\Database\Seeder;

class BranchLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BranchLevel::create([
            'name' => 'اولى',
        ]);

        BranchLevel::create([
            'name' => 'ثانية',
        ]);

        BranchLevel::create([
            'name' => 'ثالثة',
        ]);
    }
}
