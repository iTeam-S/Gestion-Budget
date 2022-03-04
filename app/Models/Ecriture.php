<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Ecriture fait reference a l'argent qui entre ou qui sort
 * 
 */
class Ecriture extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function comptes(){
        return $this->belongsTo('App\Compte');
    }

    public function journal(){
        return $this->hasOne('App\Journal');
    }
}
