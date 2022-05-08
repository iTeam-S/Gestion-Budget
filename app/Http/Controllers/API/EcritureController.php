<?php

namespace App\Http\Controllers\API;

use DateTime;
use App\Models\User;
use App\Models\Group;
use App\Models\Ecriture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\IndexerEcriture;
use Illuminate\Support\Facades\Storage;

class EcritureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response= [];
        if($q= $request->input("q")){

            switch($q){
                case "distinct":

                    if($j= $request->input("j")){

                        $response["entrant"]= Ecriture::where("type", "=", "1")
                            ->where("journal_id", '=', $j)
                            ->get(["somme", "updated_at"]);

                            $response["sortant"]= Ecriture::where("type", "=", "0")
                            ->where("journal_id", '=', $j)
                            ->get(["somme", "updated_at"]);

                    }
                    else{

                        $response["entrant"]= Ecriture::where("type", "=", "1")->get(["somme", "updated_at"]);
                        $response["sortant"]= Ecriture::where("type", "=", "0")->get(["somme", "updated_at"]);
                    }
            }
        }
        else{

            $response= Ecriture::all();
        }



        return response()->json($response, 200);
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $user= json_decode($request->input("utilisateur"));
        $group= Group::where("id","=",$user->group_id)->first("name");
        $adminGroup= Group::where("name", "=", "administrateur")->first(["id"]);
        $leadGroup= Group::where("name", "=", "lead")->first(["id"]);

        $admins= User::where("group_id", "=", $adminGroup->id)->get();
        $leads= User::where("group_id", "=", $leadGroup->id)->get();



        $filename= $request->file("attachment")->getClientOriginalName();
        $ecriture= NULL;
        $somme= $request->input('somme');
        $account_id= $request->input('account');
        $journal_id= $request->input("journal");
        $type= $request->input("type"); // un entrant
        $state= $group->name =="administrateur" ? 1: 0;
        $motif= $request->input('motif');
        $attachment= $request->file('attachment')->storeAs("public", $filename);
        $date= $request->input("date") ? $request->input("date"): NULL;

        $attachment= explode("public/", $attachment)[1];
        $attachment= "storage/".$attachment;

        if($date= $request->input("date")){
            $ecriture= new Ecriture([
                "somme"=> floatval($somme),
                "motif"=> $motif,
                "attachment"=> $attachment,
                "account_id"=> intval($account_id),
                "journal_id"=> intval($journal_id),
                "type"=> intval($type),
                "state"=> intval($state),
                "created_at"=> $date,
                "updated_at"=> $date,
            ]);
        }else{

            $now = new DateTime();
            $now= $now->getTimestamp();

            $ecriture= new Ecriture([
                "somme"=> floatval($somme),
                "motif"=> $motif,
                "attachment"=> $attachment,
                "account_id"=> intval($account_id),
                "journal_id"=> intval($journal_id),
                "type"=> intval($type),
                "state"=> intval($state),
                "created_at"=> date("Y-m-d H:i:s", $now),
                "updated_at"=> date("Y-m-d H:i:s", $now),

            ]);
        }

        if($group->name == "administrateur"){

            // enregistrement dans la base
            $ecriture->save();
        }
        elseif($group->name == "lead"){

            foreach($admins as $admin):

                $admin->notify(new IndexerEcriture($user, $ecriture));
            endforeach;
        }

        return redirect('/ecritures');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ecriture  $ecriture
     * @return \Illuminate\Http\Response
     */
    public function show(Ecriture $ecriture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ecriture  $ecriture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ecriture $ecriture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecriture  $ecriture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ecriture $ecriture)
    {
        //
    }

    public function parMois(Request $request){

        $month= ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aôut", "septembre",
        "novembre", "decembre"];

        $responses= [];


        if($q= $request->input("q")){

            switch($q){
                case "distinct":

                    if($j= $request->input("j")){
                        $entrants= DB::select("SELECT MONTH(updated_at) AS mois , SUM(somme)  AS total
                            FROM  ecritures
                            WHERE type= 1 AND journal_id=$j
                            GROUP BY MONTH(updated_at)
                            ORDER BY MONTH(updated_at) ASC");

                            foreach($entrants as $ecriture){

                                $ecriture->mois= $month[$ecriture->mois];
                            }


                        $sortants= DB::select("SELECT MONTH(updated_at) AS mois , SUM(somme)  AS total
                            FROM  ecritures
                            WHERE type= 0 AND journal_id=$j
                            GROUP BY MONTH(updated_at)
                            ORDER BY MONTH(updated_at) ASC");

                            foreach($sortants as $ecriture){

                                $ecriture->mois= $month[$ecriture->mois];
                            }

                        $responses["entrants"]= $entrants;
                        $responses["sortants"]= $sortants;


                    }
            }
        }
        else{

            $ecritures= DB::select("SELECT MONTH(updated_at) AS mois , SUM(somme)  AS total
                FROM  ecritures
                GROUP BY MONTH(updated_at)
                ORDER BY MONTH(updated_at) ASC");

            foreach($ecritures as $ecriture){

                $ecriture->mois= $month[$ecriture->mois];
            }

            $responses= $ecritures;
        }

        return response()->json($responses);

    }
}
