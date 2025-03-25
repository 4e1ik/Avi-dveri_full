<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $products = collect();
        if (strlen($this->searchTerm) >= 1) {
            $products = Product::where('active', 1)->where('title', 'LIKE', '%' . $this->searchTerm . '%')->get();
        }
        return view('livewire.search', compact('products'));
    }
}
