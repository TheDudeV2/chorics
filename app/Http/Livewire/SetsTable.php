<?php

namespace App\Http\Livewire;

use App\Models\Set;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SetsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.sets-table', [
            'sets' => Set::paginate(10),
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

    public function removeSong($setId, $songId): void
    {
        DB::table('set_song')
            ->where('set_id', $setId)
            ->where('song_id', $songId)
            ->delete();
    }
}
