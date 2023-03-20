<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'emil',
             'email' => 'emil@ambrgrading.com',
             'email_verified_at' => now(),
             'password' => '$2y$10$v7AhD1ZM2oDJq8cAKqGBmOtO36yrRW9UtoDk2nShOHwj9bOhq5wfS',
             'remember_token' => 'wZTpYhcXDh',
         ]);

        $this->call(KeySeeder::class);

        User::factory(10)->create();
        Song::factory(100)->create();
    }
}
