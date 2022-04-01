<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    public function permission(){

        return hasOne(Permission::class);
    }

    public function users(){
        
        return hasMany(User::class);
    }
}
