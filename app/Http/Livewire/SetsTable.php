<?php

namespace App\Http\Livewire;

use App\Models\Set;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SetsTable extends Component
{
    use WithPagination;

    public bool $showNewSetModal = false;

    public string $name;
    public string $description;

    protected $rules = [
        'name' => 'string|required|min:3|max:155',
        'description' => 'string|nullable|max:512',
    ];

    public function mount()
    {
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.sets-table', [
            'sets' => Set::where('user_id', '1')->orderByDesc('updated_at')->paginate(10),
        ]);
    }

    public function updateSetOrder($orderedIds): void
    {
        $setId = explode('-',$orderedIds[0]['value'])[0];

        foreach($orderedIds as $order => $orderedId){
            $songId = explode('-', $orderedId['value'])[1];
            DB::table('set_song')
                ->where('set_id', $setId)
                ->where('song_id', $songId)
                ->update(['order' => $order]);
        }
    }

    public function createSet()
    {
        $this->validate();

        Set::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
        ])->save();

        $this->name = '';
        $this->description = '';
        $this->showNewSetModal = false;
    }

    public function addSong($setId)
    {
        dd('IMPLEMENT ME');     //TODO implement me
    }

    public function removeSong($setId, $songId): void
    {
        DB::table('set_song')
            ->where('set_id', $setId)
            ->where('song_id', $songId)
            ->delete();
    }


}
