<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupe extends Model
{
    use HasFactory, SoftDeletes;

    public function users(){

        return $this->hasMany(User::class);
    }
}
