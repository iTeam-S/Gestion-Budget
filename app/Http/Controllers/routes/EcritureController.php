<?php

namespace App\Http\Controllers\routes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcritureController extends Controller
{
    public function index(){

        return view("ecritures");
    }
}
