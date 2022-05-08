<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Ecriture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {

        $journals= Journal::paginate(5);
        $journalsActif= Journal::actifs();
        $totalJournal= Journal::count("id");
        $statistiqueEcriture= Ecriture::statistique();


        return view('dashboard', [
            "journals"=> $journals,
            "journalsActif"=> $journalsActif,
            "totalJournal"=> $totalJournal,
            "statistiqueEcriture"=> $statistiqueEcriture,

        ]);
    }
}
