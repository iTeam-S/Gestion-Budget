<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{

    protected $compte;
        /**
     * Constructeur du controller des comptes
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
        $this->compte= new Compte();
    }

    /**
     * retourne toutes les comptes
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(){

        $comptes= Compte::all();

        return response()->json($comptes);
    }

    /**
     * retourne un compte
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id){

        $compte= Compte::find($id);

        return response()->json($compte);
    }

    /**
     * instancie un compte dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

        $new_compte= $this->compte->store($request);
        return response()->json([ 'message' => 'compte créer', 'compte' => $new_compte ], 201);
    }


    /**
     * instancie un compte dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function modifier(int $id, Request $request){

        $updated_compte= $this->compte->modifier($id, $request);

        return response()->json($updated_compte);
    }


    /**
     * supprime un compte dans la base
     * En fait, ceci n'est pas vraiment la suppression definitive de l'compte dans la base
     * car c'est seulement la colonne deleted_at qui est remplie. Quant à laravel, Le framework
     * pense que c'est vraiment supprimé côté client
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(int $id){

        $message= $this->compte->remove($id);
        return response()->json($message);
    }
}
