<?php

namespace Database\Seeders;

use App\Models\Set;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sets = Set::factory(30)->create();

        $setIds = Set::all()->pluck('id')->toArray();
        $songIds = Song::all()->pluck('id')->toArray();

        $tmpSongIds = $songIds;
        shuffle($tmpSongIds);

        foreach($setIds as $setId) {
            for($i = 0; $i < random_int(3,20); $i++) {
                DB::table('set_song')->insert([
                    'set_id' => $setId,
                    'song_id' => array_shift($tmpSongIds),
                    'order' => $i,
                ]);
            }
            $tmpSongIds = $songIds;
            shuffle($tmpSongIds);
        }
    }
}
