<?php

namespace Database\Seeders;

use App\Models\Clubs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=1; $i <= 20; $i++)
        {
            Clubs::create([
                'price' => $faker->numberBetween(100,1000),
                'name' => $faker->name,
                'wc' => $faker->boolean(),
                'cafe' => $faker->boolean(),
                'rate' => $faker->numberBetween(1,5),
                'image' => asset('assets/images/stadium.jpg'),
                'creationDate' => $faker->dateTimeBetween(),
                'admin_id' => 1,
                'area_id' => $faker->numberBetween(1, 3),
            ]);
        }

    }
}
