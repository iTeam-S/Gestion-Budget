<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Journal;
use App\Models\Writing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class JournalController extends Controller
{
    /**
     * @param int id optional
     *
     */
    public function index(int $id){

        $entrees = Journal::find($id)->writings()
            ->where('type', '=' , 1)->paginate(5);
        $outgoings = Journal::find($id)->writings()
            ->where('type', '=' , 0)->paginate(5);

        // si la route existe
        return Route::has('journal.index') ? view("livewire.journal-min", [
            'id'=>$id,
            'entrees'=> $entrees,
            "outgoings"=> $outgoings
            ]): abort(403, "Action refusée.");
    }

    public function detailEcriture(int $id){


        $writing = Writing::find($id);
        $accounts= Account::all();

        return Route::has('journal.index.detail') ? view("components.journal", [
            'writing'=> $writing,
            "accounts"=> $accounts,
            ]): abort(404, "Not found.");
    }

    public function getAll(){

        $journals= Journal::all();
        return view("journals", compact("journals"));
    }

}