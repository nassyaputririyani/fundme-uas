<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            Project::create([
                'users_id' => 1,
                'title' => $faker->sentence(2),
                'short_description' => $faker->sentence(15),
                'description' => $faker->sentence(50),
                'business_proposal_url' => $faker->imageUrl(),
                'image_url' => $faker->imageUrl(),
                'goals' => $faker->sentence(3),
                'goal_amount' => $faker->numberBetween(100000, 1000000),
                'deadline' => $faker->date()
            ]);
        }
    }
}
