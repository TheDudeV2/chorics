<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Show extends Component
{
    public $song;

    public function mount(Song $song)
    {
        $this->song = $song;
    }

    public function render(Song $song)
    {
        return view('livewire.song.show');
    }

    public function edit()
    {
        return redirect()->to('/song/'.$this->song->id.'/edit');
    }

    public function addToSet()
    {
        //TODO: implement
    }

    public function transposeUp()
    {
        $this->song->transposeUp();
    }

    public function transposeDown()
    {
        $this->song->transposeDown();
    }
}
