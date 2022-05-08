<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(){

        $journals= Journal::all();
        return view("journals", compact("journals"));
    }

    public function details(int $id){
        $journal= Journal::find($id);
        $ecritureJournals= $journal->ecritures()->get();


        return view("journals-details", [
            "journal"=> $journal,
            "ecritureJournals"=> $ecritureJournals,
        ]);
    }
}
