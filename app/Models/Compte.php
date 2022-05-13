<?php

namespace App\Models;

use Validator;
use App\Models\Ecriture;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compte extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable= [
        "code",
        "nom",
        "description"
    ];

        // CRUD
    /**
     * retourne toutes les comptes stockées dans la base
     * @return array
     */
    public function getAll():array{

        return self::all();
    }

    /**
     * return une compte
     * @return Compte
     */
    public function get(int $id):Compte{

        $compte= self::find($id);
        return $compte;
    }


    /**
     * instancie une compte dans la base des données
     * retourne la nouvelle compte
     * @return compte
     */
    public function store(Request $request):Compte{

        $validator= Validator::make($request->all(), [
            "code"=> "required|string|min:8",
            "nom"=> "required|string|unique:comptes",
            "description"=> "required|string"
        ]);

        if($validator->fails()){

            dd(["erreur"=> "au moins un des types des données sont invalides"]);
        }

        $compte= self::create($validator->validated());

        return $compte;
    }

    /**
     * mets à jour une compte
     * @return Compte
     */
    public function modifier(int $id, Request $request):Compte{

        /*
        matcher le nom de la colonne de la requete si celle-ci correspond à
        un et une seule colonne dans la base des données
        */

        $compte= self::find($id);
        $compteur_updated= 0;
        $columns= [];


        $requestKeys= collect($request->all())->keys();

        $columnsInDB= get_table_columns("mysql", "comptes");

        foreach($columnsInDB as $column){

            array_push($columns, $column->COLUMN_NAME);
        }

        foreach($requestKeys as $key){

            if(in_array($key, $columns) && $key!= "id"){

                // faille- validation des données
                $compte->update([$key=> $request->$key]);
                $compteur_updated +=1;
            }
        }

        return $compteur_updated == 0 ? dd("erreur de modification"): $compte;
    }

    /**
     * supprimer un compte
     * @return array
     */
    public function remove(int $id):array{

        $compte= self::find($id);

        return $compte->delete()? ["response"=> "le compte a été bien supprimé"]: dd("erreur de suppression");
    }

    public function ecritures(){

        return $this->hasMany(Ecriture::class);
    }
}
