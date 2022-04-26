<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Writing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     */
    public function index(){

        $capital = Writing::sum('amount');
        $journals= Journal::all();

        return view('home', [
            "capital"=> $capital,
            "journals"=> $journals,
        ]);
    }

}
