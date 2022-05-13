<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Ecriture;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }


    /**
     * retourne les statistiques
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(){

        $response= [];

        $capital= Ecriture::sum("montant");
        $nombre_journal= Journal::count("id");
        $nombre_ecriture= Ecriture::count("id");

        $response["capital"]= $capital;
        $response["nombre_journal"]= $nombre_journal;
        $response["nombre_ecriture"]= $nombre_ecriture;

        return response()->json($response);
    }
}
