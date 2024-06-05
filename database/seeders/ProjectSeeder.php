<?php

namespace Database\Seeders;
use App\Models\Portfolio;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++){

            $new_portfolio = new Portfolio();
            $new_portfolio->project_name = $faker->word();
            $new_portfolio->description = $faker->sentence(5);
            $new_portfolio->working_hours = $faker->randomDigitNot(0);
            $new_portfolio->co_workers = $faker->name();
            $new_portfolio->save();
        }   

    }
}
