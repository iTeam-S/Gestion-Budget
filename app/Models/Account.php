<?php

namespace App\Models;

use App\Models\Ecriture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    public function ecritures(){

        return $this->hasMany(Ecriture::class);
    }
}
