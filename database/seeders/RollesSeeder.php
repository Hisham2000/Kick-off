<?php

namespace Database\Seeders;

use App\Models\Rolles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RollesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rolles::create([
            "name" => "admin"
        ]);
        
        Rolles::create([
            "name" => "user"
        ]);
    }
}
