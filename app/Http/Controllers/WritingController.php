<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class WritingController extends Controller
{

    /**
     * @param int $id optionelle
     *
     */
    public function index(Request $request){

        $id= $request->input("j");

        $entrees = Journal::find($id)->writings()->where('type', '=' , 1)->paginate(5);
        $outgoings = Journal::find($id)->writings()->where('type', '=' , 0)->paginate(5);

        // si la route existe
        return Route::has('writingsContainer') ? view("writings", [
            'id'=>$id,
            'entrees'=> $entrees,
            "outgoings"=> $outgoings
            ]): abort(403, "Action refusée.");

    }
}
