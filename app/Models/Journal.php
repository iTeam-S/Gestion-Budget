<?php

namespace App\Models;

use App\Models\journal;
use App\Models\Ecriture;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable= ["nom", "total"];

    public static function actifs(){
        $response= [];
        $journalsInDB= DB::select("select journals.name from (select distinct j.name, j.id, w.updated_at from journals j join journals w on j.id= w.journal_id order by updated_at desc) as journals group by journals.name");


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
        self::journals()->groupBy(date_format("updated_at", '%M'))->get(date_format("updated_at", sum("somme")));
    }


    // CRUD


    /**
     * retourne toutes les journals stockées dans la base
     * @return array
     */
    public static function getAll():array{

        return self::all();
    }

    /**
     * return une journal
     * @return Journal
     */
    public static function get(int $id):Journal{

        $journal= self::find($id);
        return $journal;
    }

    private function count_ecriture(): int{

        $ecritures= Ecriture::all();

        return $ecritures->count();
    }

    /**
     * instancie une journal dans la base des données
     * retourne la nouvelle journal
     * @return Journal
     */
    public static function store(Request $request):Journal{

        $total= 0;
        $validator= Validator::make($request->all(), [
            "nom"=> "required|string|unique:journals"
        ]);

        if($validator->fails()){

            dd(["erreur"=> "au moins un des types des données sont invalides"]);
        }

        $total= count_ecriture() == 0 ? 0: $this->ecritures()::sum("montant")->get();



        $journal= self::create[
            array_merge(
                $validator->validated(),
                ["total"=> $total]
            )
        ];

        return $journal;
    }

    /**
     * mets à jour une journal
     * @return journal
     */
    public static function update(int $id, Request $request):journal{

        /*
        matcher le nom de la colonne de la requete si celle-ci correspond à
        un et une seule colonne dans la base des données
        */

        $journal= self::find($id);
        $compteur_updated= 0;

        $requestKeys= collect($request->all())->keys();

        $columns= get_table_columns("mysql", "journals");

        foreach($requestKeys as $key){

            if(in_array($key, $columns)){

                // faille- validation des données
                $journal::update([$key=> $request->$key]);
                $compteur_updated +=1;
            }
        }

        return $compteur_updated == 0 ? dd("erreur de modification"): $journal;
    }

    /**
     * supprimer un journal
     * @return array
     */
    public static function remove(int $id):array{

        $journal= self::find($id);

        return $journal->delete()? ["response"=> "le journal a été bien supprimé"]: dd("erreur de suppression");
    }




    // relation
    public function ecritures(){

        return $this->hasMany(Ecriture::class);
    }

    //fin relation-------------------------------------------

}
