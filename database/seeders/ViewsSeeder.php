<?php

namespace Database\Seeders;

use App\Models\Views;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Views::create([
            'admin_id' => 1,
            'user_id' => 2,
            'club_id' => 1
        ]);
    }
}
