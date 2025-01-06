<?php

namespace App\Livewire;

use App\Models\Door;
use App\Models\Fitting;
use App\Models\Product;
use App\Services\FittingService;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $results = collect();
        if (strlen($this->searchTerm) >= 1) {
            $results = Product::where('active', 1)->where('title', 'LIKE', '%' . $this->searchTerm . '%')->get();
        }
        return view('livewire.search', compact('results'));
    }
}
