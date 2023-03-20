<?php

namespace App\Http\Livewire;

use App\Models\Set;
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
}
