<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Journal;
use App\Models\Ecriture;
use Illuminate\Http\Request;
use App\Notifications\ValiderEcriture;

class EcritureController extends Controller
{
    public function index(){


        $ecritures= Ecriture::paginate(5);
        $ecritureRecents= Ecriture::plusRecents();
        $accounts= Account::all();
        $journals= Journal::all();

        return view("ecritures", [
            'ecritures'=> $ecritures,
            'ecritureRecents'=> $ecritureRecents,
            'journals'=> $journals,
            'accounts'=> $accounts
        ]);
    }

    public function valider(Request $request){

        $admin= Auth::user();
        $param= $request->input("ecriture");

        $leadId= $param["notifier"]["id"];
        $lead= User::find($leadId);
        $ecriture= $param["ecriture"];

        $newEcriture= new Ecriture();

        $newEcriture= new Ecriture([
            "somme"=> floatval($ecriture["somme"]),
            "motif"=> $ecriture['motif'],
            "attachment"=> $ecriture["attachment"],
            "account_id"=> intval($ecriture["account_id"]),
            "journal_id"=> intval($ecriture["journal_id"]),
            "type"=> intval($ecriture["type"]),
            "state"=> 1,
            "created_at"=> $ecriture["created_at"],
            "updated_at"=> $ecriture["updated_at"],

        ]);


        // notifier celui qui l'a indexér

        $lead->notify(new ValiderEcriture($admin, $newEcriture));

        return response()->json(["resultat"=> "ok"]);
    }

}
