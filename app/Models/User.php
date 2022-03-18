<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends \TCG\Voyager\Models\User
{

    // ??
    use HasFactory, Notifiable;

    // un variable $pecial ?
    protected $guarded = [];

    // un variable special ?
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // un variable special ?
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # contraintes
    public function groupe(){
        return $this->hasOne('App\Groupe');
    }

    public function ecritures(){
        return $this->hasMany('App\Ecriture');
    }
}
