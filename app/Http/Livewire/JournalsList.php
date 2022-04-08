<?php

namespace App\Http\Livewire;

use App\Models\Journal;
use App\Models\Writing;
use Livewire\Component;
use Illuminate\Support\Facades\Route;


class JournalsList extends Component
{


    public function goToJournal($id){

        if(Route::has('journal.index')):

            return redirect()->route('journal.index', compact('id'));
        else:

            abort(403, 'Action refusée.');
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

        return view('livewire.journals-list', [
            'journals' => Journal::all(),
        ]);
    }
}
