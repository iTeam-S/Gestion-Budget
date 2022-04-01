<?php

namespace App\Http\Livewire;

use App\Models\Journal;
use App\Models\Writing;
use Livewire\Component;
use Illuminate\Support\Facades\Route;


class Statistic extends Component
{
   

    public function journalIndex($id){

        if(Route::has('journals.index')):

            return redirect()->route('journals.index', [
                'id' => $id,
            ]);
        else:

            abort(403, 'Unauthorized action.');
        endif;
    }

    public function showEntry($entry, $account){

        dd($entry);
        
        if(Route::has('writing.show')):
            return redirect()->to('writing.show', [
                'entry' => $entry,
                'account' => $account,

            ]);
        else:

            abort(403, 'Unauthorized action.');
        endif;
    }
    public function render()
    {

        return view('livewire.statistic', [
            'journals' => Journal::all(),
            'capital' => Writing::sum('amount'),
        ]);
    }
}
