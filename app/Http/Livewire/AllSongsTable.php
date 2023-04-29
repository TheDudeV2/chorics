<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AllSongsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.all-songs-table', [
            'songs' => Song::paginate(10),
        ]);
    }

    public function addSong()
    {
        dd('IMPLEMENT ME');     //TODO implement me
    }
}
