<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\Project;
use Faker\Generator as Faker;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++){

            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->project_name = $faker->word();
            $new_project->description = $faker->sentence(5);
            $new_project->working_hours = $faker->randomDigitNot(0);
            $new_project->co_workers = $faker->name();
            $new_project->save();
        }   

    }
}
