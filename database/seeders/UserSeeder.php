<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Hisham Anwar",
            "email" => "hishamanwar72@gmail.com",
            "password" => Hash::make(123456789),
            "phone"=> "01149027532",
            "roll_id" => 1,
        ]);
        User::create([
            "name" => "Hisham Farouk",
            "email" => "hishamanwar722@gmail.com",
            "password" => Hash::make(123456789),
            "phone"=> "01149027532",
            "roll_id" => 2,
        ]);
    }
}
