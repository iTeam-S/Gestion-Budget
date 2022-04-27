<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Http\Livewire\Writing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\validateWriting;

class Journal extends Component
{
    protected $entrees;
    protected $outgoings;
    protected $accounts;

    # la fonction mount est le constructeur de classe
    public function mount(Int $id){
        /* Commentaires:
        (1) les écritures ayant comme valeur 1 l'attribut type sont des écritures entrant
        (2) les écritures ayant comme valeur 0 l'attribut type sont des écritures sortant

        */


        if(!empty(\App\Models\Journal::find($id))):

            # (1)
            $this->entrees = \App\Models\Journal::find($id)->writings()->where('type', '=' , 1)->get();


            # (2)
            $this->outgoings = \App\Models\Journal::find($id)->writings()->where('type', '=' , 0)->get();
        else:

            abort(403, 'Unauthorized action.');
        endif;

    }

    public function addEntry(){


        if(Route::has('writing.create')):

            redirect()->route('writing.create');
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
            'entrees' => $this->entrees,
            'outgoings' => $this->outgoings,

        ]);
    }
}