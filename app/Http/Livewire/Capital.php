<?php

namespace App\Http\Livewire;

use App\Models\Writing;
use Livewire\Component;

class Capital extends Component
{
    public function render()
    {
        $capital = Writing::sum('amount');
        return view('livewire.capital', compact('capital'));
    }
}
