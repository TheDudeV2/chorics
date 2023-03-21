<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class YourSongsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.your-songs-table', [
            'songs' => Song::with('key')->where('user_id',Auth::user()->id)->paginate(10),
        ]);
    }

    public function addSong()
    {
        dd('IMPLEMENT ME');     //TODO implement me
    }
}
