<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Account;
use App\Models\Journal;
use App\Models\Writing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Notifications\indexedWriting;

class CreateWriting extends Component
{

    protected $fillable = [
        'amount',
        'motif',
        'account',
        'journal',
        'attachment',
    ];

    public $amount;
    public $motif;
    public $account;
    public $journal;
    public $attachment;


    public function submit(){

        $writing = new Writing;

        # les attributs de l'écriture
        $writing->amount = $this->amount;
        $writing->motif = $this->motif;
        $writing->account_id = $this->account;
        $writing->type = 1;
        $writing->state = 0;
        $writing->journal_id = Journal::all()->first();
        $writing->journal_id = $writing->journal_id->id;
        $writing->attachment = "NULL";
        # ---------------------------------------------
        # ---------------------------------------------


        if(Auth::user()->group->name == "administrateur"):

            $writing->state = 1;
            CreateWriting::save($writing);

        elseif(Auth::user()->group->name == "lead"):

            // Notifier tous les utilisateurs qu'un lead veut qu'on valide une écriture
            # Auth::user()->group->notify(new indexedWriting($))
            $admins = User::where('group_id', '=', Auth::user()->group->id)->get();

            foreach($admins as $admin){

                $admin->notify(new indexedWriting($writing));
            }

            dd($admins);


        endif;
    }

    /**
     * valide les requetes d'enregistrement des lead,
     * enregistrer l' ecriture dans la base de données,
     * notifier l'utilisateur qui à fait le requete que c'est validé
     *
     */
    public static function validateWriting(Writing $writing){
        if($writing->state && Auth::user()->group->name == "administrateur"){

            self::save($writing);

            // lancer la notification validateNotification
        }

    }

    /**
     * enregistrement une écriture dans la base des données
     *
     */
    public static function save(Writing $writing){
        if($writing->state){

            $writing->save();
            dd($writing);
        }
    }

    public function render()
    {

        return view('livewire.create-writing');
    }
}
