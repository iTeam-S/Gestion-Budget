<?php

namespace App\Models;

use App\Models\Ecriture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compte extends Model
{
    use HasFactory, SoftDeletes;

    public function ecritures(){

        return $this->hasMany(Ecriture::class);
    }
}
