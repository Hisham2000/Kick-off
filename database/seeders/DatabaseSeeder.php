<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AreaSeeder::class);
        $this->call(RollesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClubsSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(ViewsSeeder::class);
        $this->call(CallsSeeder::class);
    }
}
