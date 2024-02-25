<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Technologie;

class TechnologieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technologie :: factory() -> count(10) -> create() -> each(
            function($technologie){
                $projects = Project :: inRandomOrder() -> limit(rand(1,5)) -> get();
                $technologie -> projects() -> attach($projects);
                $technologie -> save();

            }
        );
    }
}
