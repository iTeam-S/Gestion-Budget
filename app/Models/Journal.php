<?php

namespace App\Models;

use App\Models\Ecriture;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use HasFactory;

    public static function actifs(){
        $response= [];
        $journalsInDB= DB::select("select journals.name from (select distinct j.name, j.id, w.updated_at from journals j join ecritures w on j.id= w.journal_id order by updated_at desc) as journals group by journals.name");


        foreach($journalsInDB as $journal){
            array_push($response, $journal);

            // pointer sur le dernier element du tableau;
            $journal= end($response);

            $journalOriginal= self::where("name", "=", $journal->name)->get();
            $journal->{"id"}= $journalOriginal[0]->id;
        }

        return $response;
    }

    public function statistiqueParMois(){
        self::ecritures()->groupBy(date_format("updated_at", '%M'))->get(date_format("updated_at", sum("somme")));
    }

    public function ecritures(){

        return $this->hasMany(Ecriture::class);
    }

}
