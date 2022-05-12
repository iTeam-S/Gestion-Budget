<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Journal;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ecriture extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * retourne les 4 derniers écritures
     * @return array
     */

    protected $fillable= [
        "montant",
        "motif",
        "piece_jointe",
        "account_id",
        "journal_id",
        "type",
        "etat",
        "created_at",
        "updated_at"
    ];

    public static function plusRecents(){
        $response= [];

        $recentsInDB= self::orderBy("updated_at")->get();


        foreach($recentsInDB as $ecriture){

            $journalOf= $ecriture->journal()->first(["name"]);
            $accountOf= $ecriture->account()->first(['name']);

            array_push($response, $ecriture);

            // pointer sur le dernier element du tableau;
            $ecriture= end($response);
            $ecriture->{"journal"}= $journalOf->name;
            $ecriture->{"account"}= $accountOf->name;
        }

        return $response;
    }

    public static function statistique(){

        $response= [];

        $capital = Ecriture::sum("somme");
        $totalEcriture= Ecriture::count("id");
        $totalEntrant= Ecriture::where('type', 1)->sum("somme");
        $totalSortant= Ecriture::where('type', 0)->sum("somme");

        $response["capital"]= $capital;
        $response["totalEcriture"]= $totalEcriture;
        $response["totalEntrant"]= $totalEntrant;
        $response["totalSortant"]= $totalSortant;

        return $response;

    }

    public function statistiqueParMois(){

        $response= DB::select("select date_format(updated_at, '%M'),sum(somme)
            from ecritures
            group by date_format(date_column, '%M');");
    }

    public function journal(){

        return $this->belongsTo(Journal::class);
    }

    public function account(){

        return $this->belongsTo(Account::class);
    }



}
