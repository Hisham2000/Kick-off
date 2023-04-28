<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(["name" => "Maadi"]);
        Area::create(["name" => "Cairo"]);
        Area::create(["name" => "Giza"]);
        Area::create(["name" => "Dar Elsalam"]);
        Area::create(["name" => "Kebaa"]);
        Area::create(["name" => "Ramses"]);
        Area::create(["name" => "Alf Maskan"]);
        Area::create(["name" => "El Salam"]);
        Area::create(["name" => "Doki"]);
        Area::create(["name" => "MOhndseen"]);
    }
}
