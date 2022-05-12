<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Constructeur du controller des journals
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * retourne toutes les journals
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(){

        $journals= Journal::all();

        return response()->json($journals);
    }

    /**
     * retourne un journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id){

        $journal= Journal::find($id);

        return response()->json($journal);
    }

    /**
     * instancie un journal dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

        $new_journal= Journal::store($request);
        return response()->json([ 'message' => 'journal créer', 'journal' => $new_journal ], 201);
    }


    /**
     * instancie un journal dans la base
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request){

        $updated_journal= Journal::update($id, $request);

        return response()->json($updated_journal);
    }


    /**
     * supprime un journal dans la base
     * En fait, ceci n'est pas vraiment la suppression definitive de l'journal dans la base
     * car c'est seulement la colonne deleted_at qui est remplie. Quant à laravel, Le framework
     * pense que c'est vraiment supprimé côté client
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(int $id){

        $message= Journal::remove($id);
        return response()->json($message);
    }


}
