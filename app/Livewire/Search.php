<?php

namespace App\Livewire;

use App\Models\Door;
use App\Models\Fitting;
use App\Services\FittingService;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
//    public $doors;

    public function render()
    {
        $results = collect();
        if (strlen($this->searchTerm) >= 1) {
            $doors = Door::where('active', 1)->where('title', 'LIKE', '%' . $this->searchTerm . '%')->get();
            $fittings = Fitting::where('active', 1)->where('title', 'LIKE', '%' . $this->searchTerm . '%')->get();
            $results = $results->merge($fittings)->merge($doors);
//            dd($results);
        }
        return view('livewire.search', compact('results'));
    }
}
