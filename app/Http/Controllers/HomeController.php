<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Ecriture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {

        return view('dashboard');
    }
}
