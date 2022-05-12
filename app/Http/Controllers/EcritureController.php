<?php

namespace App\Http\Controllers;

use App\Models\Ecriture;
use Illuminate\Http\Request;

class EcritureController extends Controller
{
    protected $ecriture;

    /**
     * Constructeur du controller des ecritures
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
        $this->ecriture= new Ecriture();
    }

    /**
     * retourne toutes les ecritures
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(){

        $ecritures= Ecriture::all();

        return response()->json($ecritures);
    }

    /**
     * retourne un ecriture
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id){

        $ecriture= Ecriture::find($id);

        return response()->json($ecriture);
    }

    /**
     * instancie un ecriture dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

        $new_ecriture= $this->ecriture->store($request);
        return response()->json([ 'message' => 'Ecriture créer', 'ecriture' => $new_ecriture ], 201);
    }


    /**
     * instancie un ecriture dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function modifier(int $id, Request $request){

        $updated_ecriture= $this->ecriture->modifier($id, $request);

        return response()->json($updated_ecriture);
    }


    /**
     * supprime un ecriture dans la base
     * En fait, ceci n'est pas vraiment la suppression definitive de l'ecriture dans la base
     * car c'est seulement la colonne deleted_at qui est remplie. Quant à laravel, Le framework
     * pense que c'est vraiment supprimé côté client
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(int $id){

        $message= $this->ecriture->remove($id);
        return response()->json($message);
    }

}
