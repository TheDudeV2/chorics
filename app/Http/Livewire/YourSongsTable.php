<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class YourSongsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.your-songs-table', [
            'songs' => Song::with('key')->paginate(10),
        ]);
    }
}
