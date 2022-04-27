<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Journal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writing extends Model
{
    use HasFactory, SoftDeletes;

    public function journal(){

        return $this->belongsTo(Journal::class);
    }

    public function account(){

        return $this->belongsTo(Account::class);
    }
}