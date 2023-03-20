<?php

namespace Database\Seeders;

use App\Models\Key;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keys')->insert([
            'tonic' => 'C',
            'relative_minor' => 'A',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'Db',
            'enharmonic' => 'C#',
            'relative_minor' => 'Bb',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'D',
            'relative_minor' => 'B',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'Eb',
            'enharmonic' => 'D#',
            'relative_minor' => 'C',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'E',
            'relative_minor' => 'Db',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'F',
            'relative_minor' => 'D',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'Gb',
            'enharmonic' => 'F#',
            'relative_minor' => 'Eb',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'G',
            'relative_minor' => 'E',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'Ab',
            'enharmonic' => 'G#',
            'relative_minor' => 'F',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'A',
            'relative_minor' => 'Gb',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'Bb',
            'enharmonic' => 'A#',
            'relative_minor' => 'G',
        ]);

        DB::table('keys')->insert([
            'tonic' => 'B',
            'relative_minor' => 'Ab',
        ]);
    }
}
