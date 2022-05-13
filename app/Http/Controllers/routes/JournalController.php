<?php

namespace App\Http\Controllers\routes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(){

        return view("journals");
    }
}
