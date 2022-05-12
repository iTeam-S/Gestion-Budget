<?php

namespace App\Models;

use Validator;
use App\Models\Account;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        "compte_id",
        "journal_id",
        "type",
        "etat",
        "updated_at"
    ];

    public function plusRecents(){
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

    public function statistique(){

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

    // CRUD
    /**
     * retourne toutes les ecritures stockées dans la base
     * @return array
     */
    public function getAll():array{

        return self::all();
    }

    /**
     * return une ecriture
     * @return Ecriture
     */
    public function get(int $id):Ecriture{

        $ecriture= self::find($id);
        return $ecriture;
    }

    /**
     * instancie une ecriture dans la base des données
     * retourne la nouvelle ecriture
     * @return Ecriture
     */
    public function store(Request $request):Ecriture{



        $validator= Validator::make($request->all(), [
            "montant"=> "required|numeric",
            "motif"=> "required|string",
            "piece_jointe"=> "string|nullable",
            "compte_id"=> "required|integer",
            "journal_id"=> "required|integer",
            "type"=> "required|integer",
            "etat"=> "required|integer"
        ]);

        if($validator->fails()){

            dd(["erreur"=> "au moins un des types des données sont invalides"]);
        }

        $ecriture= self::create($validator->validated());

        return $ecriture;
    }

    /**
     * mets à jour une ecriture
     * @return Ecriture
     */
    public function modifier(int $id, Request $request):Ecriture{

        /*
        matcher le nom de la colonne de la requete si celle-ci correspond à
        un et une seule colonne dans la base des données
        */

        $ecriture= self::find($id);
        $compteur_updated= 0;
        $columns= [];

        $requestKeys= collect($request->all())->keys();

        $columnsInDB= get_table_columns("mysql", "ecritures");


        foreach($columnsInDB as $column){

            array_push($columns, $column->COLUMN_NAME);
        }

        foreach($requestKeys as $key){


            if(in_array($key, $columns) && $key!= "id"){


                $ecriture->update([$key => $request->input($key)]);
                $compteur_updated +=1;
            }
        }

        return $compteur_updated == 0 ? dd("erreur de modification"): $ecriture;
    }

    /**
     * supprimer un ecriture
     * @return array
     */
    public function remove(int $id):array{

        $ecriture= self::find($id);

        return $ecriture->delete()? ["response"=> "l'ecriture a été bien supprimé"]: dd("erreur de suppression");
    }


    // les relations
    public function journal(){

        return $this->belongsTo(Journal::class);
    }

    public function account(){

        return $this->belongsTo(Account::class);
    }
    // fin relation-----------------------------------








}
