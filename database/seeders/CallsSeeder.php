<?php

namespace Database\Seeders;

use App\Models\Calls;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class CallsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Calls::create([
            "creationdate" => $faker->date(),
            "admin_id" => 1,
            "user_id" => 2,
            "club_id" => 1,
        ]);
    }
}
