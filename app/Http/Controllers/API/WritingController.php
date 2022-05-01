<?php

namespace App\Http\Controllers\API;

use App\Models\Writing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WritingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $response= [];
        if($q= $request->input("q")){

            switch($q){
                case "distinct":

                    if($j= $request->input("j")){

                        $response["entrant"]= Writing::where("type", "=", "1")
                            ->where("journal_id", '=', $j)
                            ->get(["amount", "updated_at"]);

                            $response["sortant"]= Writing::where("type", "=", "0")
                            ->where("journal_id", '=', $j)
                            ->get(["amount", "updated_at"]);

                    }
                    else{

                        $response["entrant"]= Writing::where("type", "=", "1")->get(["amount", "updated_at"]);
                        $response["sortant"]= Writing::where("type", "=", "0")->get(["amount", "updated_at"]);
                    }
            }
        }
        else{

            $response= Writing::all();
        }



        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * recuperation 4 dernière écriture
     *
     * @return \Illuminate\Http\Response
     */
    public function recent(){

        $response = DB::select('select * from writings order by created_at limit 4');

        return response()->json($response, 200);
    }
}
