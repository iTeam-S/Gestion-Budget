<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    /**
     * fonction mount, login,  quand les appeller ?
     * 
     * s
     */
    public $email = '';
    public $password = '';
    public $remember_me = false;


    /**
     * La variable $rules est une variable special livewire, et qui definisse les filtres de validation
     * 
     */

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    
    public function mount() {
        /**
         * Cette methode est le constructeur des Component donc les scripts ici ne 
         * s'execute qu'une seule fois lors de la premiere appel a la classe
         * 
         */

        
        if(auth()->user()){
            /**
             * Si la session d'un utilisateur est active alors rediriger l'application au dashboard.
             * La session est active lorsque l'authentification est reussie
             * 
             * Le helper redirect prend comme parametre un URI
             * 
             */


            redirect('/dashboard');
        }

        /**
         * La fonction fill affecte et/ou declare des attributs pour la classe, donc ici, email et 
         * password sont des attributs de classes livewire
         * 
         */
        
        
        $this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
    }


    public function login() {
        
        /**
         * $this->validate() verifie que chaque des clés de la variables $rules respecte la(les) 
         * restrictions de sa valeur associée
         */

        $credentials = $this->validate();


        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            /**
             * La methode attempt prend en charge les tentatives d'authentification
             * @param 1: les données d'authentification
             * @param 2: si true remember me sinon don't remember me
             * 
             */

            $user = User::where(["email" => $this->email])->first();
            /**
             * selectionner l'utilisateur dans la table lié au model User selon cette email 
             * et returne le premier resultat 
             * 
             */


            auth()->login($user, $this->remember_me);
            /**
             * faire log un user de preference dans les credentials sont deja validé tel notre cas
             * 
             */
            
            return redirect()->intended('/dashboard'); 

        }else{
            return $this->addError('email', trans('auth.failed')); 

        }
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
