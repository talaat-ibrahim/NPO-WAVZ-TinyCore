<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'we fiber 409'
        ]);

        Project::create([
            'name' => 'we 577',
        ]);

        Project::create([
            'name' => 'WE815',
        ]);
    }
}
