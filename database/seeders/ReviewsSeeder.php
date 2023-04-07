<?php

namespace Database\Seeders;

use App\Models\Clubs;
use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;


class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 1; $i<Clubs::all()->count(); $i++)
        {
            for($j = 1; $j < 3; $j++)
            {
                Reviews::create([
                    'rate' => $faker->numberBetween(1, 5),
                    'user_id' => 1,
                    'club_id' => $i
                ]);
            }
            
        }
    }
}
