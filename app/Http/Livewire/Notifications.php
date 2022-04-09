<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public function render()
    {
        $unread = Auth::user()->notifications();

        dd($unread);


        return view('livewire.notifications', compact('unread'));
    }
}
