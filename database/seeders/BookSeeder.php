<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'status' => false,
            'bookDate' => date('Y-m-d'),
            'club_id' => 1,
            'start_time' => "20:05:05",
            'end_time' => "22:05:05",
            'admin_id' => 1,
            'user_id' => 2,
        ]);
    }
}
