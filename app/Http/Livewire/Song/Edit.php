<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Edit extends Component
{
    public $song;
    public $json;

    public function mount(Song $song)
    {
        $this->song = $song;
    }
    public function render()
    {
        return view('livewire.song.edit');
    }

    public function save()
    {
        $this->song->json = $this->json;
        $this->song->save();
        $this->dispatchBrowserEvent('notify', 'Song saved!');
    }

    public function cancel()
    {
        return redirect()->to('/song/'.$this->song->id);
    }

    public function transposeUp()
    {
        $this->song->transposeUp();
    }

    public function transposeDown()
    {
        $this->song->transposeDown();
    }

    protected $listeners = [
        'editorjs-save:songEditor' => 'saveEditorState',
    ];

    public function saveEditorState($editorJsonData)
    {
        $this->json = $editorJsonData;
    }

    public function debug()
    {
        dd($this);
    }
}
