<?php

namespace App\Models;

use App\Models\Writing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use HasFactory;

    public function writings(){

        return $this->hasMany(Writing::class);
    }
}
