<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Account;
use App\Models\Journal;
use App\Models\Writing;
use Illuminate\Http\Request;
use App\Notifications\SavingWriting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\IndexingWriting;

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
            'journals'=> $writings,
            'entrees'=> $entrees,
            "outgoings"=> $outgoings
            ]): abort(403, "Action refusée.");

    }

    public function getForm(){

        $accounts= Account::all();

        return Route::has('writing.form') ? view("components.writing-form", ["accounts"=> $accounts]): abort(404, "Not found.");
    }

    private function save(Writing $writing){

        $userGroup= Auth::user()->group()->get(['name', 'id']);
        $userGroupName= $userGroup[0]->name;
        $userGroupId= $userGroup[0]->id;

        $userGroupName == "administrateur"? $writing->save(): abort(403, "non autorisé");

        $users= User::where("group_id", "!=", $userGroupId)->get();

        foreach($users as $user){

            $user->notify(new SavingWriting($writing));
        }


        dd("enregistrement dans la base");
    }

    private function indexing(Writing $writing){

        // notifier tous les admin
        $groupAdmin= Group::where("name", "=", "administrateur")->get(["id"]);
        $groupAdmin_id= $groupAdmin[0]->id;
        $admins= User::where("group_id", "=", $groupAdmin_id)->get();



        foreach($admins as $admin){

            $admin->notify(new IndexingWriting($writing));
        }

        dd("admin notifié");

    }


    public function create(Request $request){


        $writing= NULL;

        $amount= $request->input('amount');
        $account_id= $request->input('account');
        $journal_id= $request->input("journal");
        $type= $request->input("type"); // un entrant
        $state= Auth::user()->name == "admin" ? 1: 0;
        $motif= $request->input('motif');
        $attachment= $request->file('attachment')->store("public");
        $date= $request->input("date") ? $request->input("date"): NULL;

        if($date= $request->input("date")){
            $writing= new Writing([
                "amount"=> floatval($amount),
                "motif"=> $motif,
                "attachment"=> $attachment,
                "account_id"=> intval($account_id),
                "journal_id"=> intval($journal_id),
                "type"=> intval($type),
                "state"=> intval($state),
                "created_at"=> $date,
            ]);
        }else{
            $writing= new Writing([
                "amount"=> floatval($amount),
                "motif"=> $motif,
                "attachment"=> $attachment,
                "account_id"=> intval($account_id),
                "journal_id"=> intval($journal_id),
                "type"=> intval($type),
                "state"=> intval($state),
            ]);
        }

        $userGroup= Auth::user()->group()->get(['name']);
        $userGroupName= $userGroup[0]->name;
        if($userGroupName == "administrateur"){

            $this->save($writing);
        }elseif($userGroupName == "lead"){


            $this->indexing($writing);
        }
    }
}
