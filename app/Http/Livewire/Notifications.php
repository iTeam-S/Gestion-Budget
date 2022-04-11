<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    protected $unreads;

    // constructeur
    public function mount(){

        $this->unreads = Auth::user()->unreadNotifications()->get();
    }
    public function render()
    {

        return view('livewire.notifications', [
            'unreads' => $this->unreads
        ]);
    }
}
