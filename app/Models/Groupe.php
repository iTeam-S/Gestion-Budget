<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    # contraintes
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function permission(){
        return $this->hasOne('App\Permission');
    }



}
