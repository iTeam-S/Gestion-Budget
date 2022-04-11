<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Notifications\validateWriting;
use Illuminate\Support\Facades\Storage;

class Writing extends Component
{
    public $writing;
    public $account;

    public function mount($id){
        $this->writing = \App\Models\Writing::find($id);

        dd($this->writing);
        $this->account = Account::find($this->writing->account_id);



    }

    public function render()
    {
        if(Auth::user()->group->name == "administrateur"):
            Auth::user()->notify(new validateWriting($this->writing));
        endif;
        return view('livewire.writing');
    }
}
