<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    /**
     * $rules, un variable special ?
     * fonction mount, login,  quand les appeller ?
     * 
     * 
     */
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount() {
        /**
         * fonction auth, que fait?
         * fonction redirect, a detailler?
         * Component->fill(), a voir?
         */
        if(auth()->user()){
            redirect('/dashboard');
        }
        $this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
    }

    public function login() {
        /**
         * Component->validate() ??
         * attempt, itended ??
         * Component->addError() a detailler ??
         * 
         */
        $credentials = $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended('/dashboard');        
        }
        else{
            return $this->addError('email', trans('auth.failed')); 
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
