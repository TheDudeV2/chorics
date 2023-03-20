<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => DB::table('users')->pluck('id')->random(),
            'key_id' => DB::table('keys')->pluck('id')->random(),

            'title' => $this->faker->sentence(2),
            'artist' => $this->faker->name(),
            'lyrics' => $this->faker->paragraph(10),
        ];
    }
}
