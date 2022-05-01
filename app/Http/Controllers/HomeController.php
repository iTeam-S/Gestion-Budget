<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Journal;
use App\Models\Writing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $journals= Journal::paginate(5);
        $ecritureRecents= DB::select("select * from writings order by updated_at desc limit 4");
        $recents= [];
        $actifs= [];

        foreach($ecritureRecents as $ecriture){
            array_push($recents, $ecriture);

            // pointer sur le dernier element du tableau;
            $ecriture= end($recents);

            $ecriture->{"journal"}= Journal::find($ecriture->journal_id)->name;
            $ecriture->{"account"}= Account::find($ecriture->account_id)->name;


        }

        $journalsActif= DB::select(" select journals.name from (select distinct j.name, j.id, w.updated_at from journals j join writings w on j.id= w.journal_id order by updated_at desc) as journals group by journals.name");

        foreach($journalsActif as $journal){
            array_push($actifs, $journal);

            // pointer sur le dernier element du tableau;
            $journal= end($actifs);

            $journalOrigin= Journal::where("name", "=", $journal->name)->get();
            $journal->{"id"}= $journalOrigin[0]->id;

        }


        $capital = Writing::sum("amount");
        $totalEcriture= Writing::count("id");
        $totalEntrant= Writing::where('type', 1)->sum("amount");
        $totalSortant= Writing::where('type', 0)->sum("amount");
        $totalJournal= Journal::count("id");


        return view('home', [
            "journals"=> $journals,
            "ecritureRecents"=> $recents,
            "capital"=> $capital,
            "totalEntrant"=> $totalEntrant,
            "totalSortant"=> $totalSortant,
            "totalJournal"=> $totalJournal,
            "totalEcriture"=> $totalEcriture,
            "journalsActif"=> $actifs,


        ]);
    }
}
