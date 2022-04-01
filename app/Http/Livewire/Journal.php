<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Http\Livewire\Writing;
use Illuminate\Support\Facades\Route;

class Journal extends Component
{
    protected $entrees;
    protected $outgoings;
    protected $accounts;

    public function mount(Int $id){
        if(!empty(\App\Models\Journal::find($id))):
            // if the writing type is 1, select all entree writings
            $this->entrees = \App\Models\Journal::find($id)->writings()->where('type', '=' , 1);

            // else select all outgoings
            $this->outgoings = \App\Models\Journal::find($id)->writings()->where('type', '=' , 0);
            $this->accounts = Account::find($id);
        else:

            abort(403, 'Unauthorized action.');
        endif;

    }

    public function addEntry(){

        if(Route::has('entry.create')):
            
            redirect()->route('entry.create');
        else:
            abort(403);
        endif;
    }

    public function showEntry($id){

        if(Route::has('writing.show')):

            redirect()->route('writing.show', [
                'id' => $id,
            ]);
        else:

            abort(403);
        endif;
    }

    public function render()
    {
    
        return view('livewire.journal', [
            'entrees' => $this->entrees->get(),
            'outgoings' => $this->outgoings->get(),
            'account' => $this->accounts,

        ]);
    }
}
