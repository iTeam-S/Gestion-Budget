<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return response()->json($users);
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
        $user= $request->input("user");

        $id= $user["id"];
        $username= $user["prenom_usuel"];
        $email= $user["mail"];
        $password= Hash::make("secret");
        $group_id= 0; // initialisation

        $admins= ["Miarana", "Princia"];
        $leads= ["Gaetan", "Ntsoa", "Rojo"];

        if(in_array($username, $admins)){
            $group= Group::where("name", "=", "administrateur")->first(["id"]);
            $group_id= $group->id;


        }
        elseif(in_array($username, $leads)){
            $group= Group::where("name", "=", "lead")->first(["id"]);
            $group_id= $group->id;

        }
        else{
            $group= Group::where("name", "=", "utilisateur")->first(['id']);
            $group_id= $group->id;
        }
        // enregistrement dans la base
        $newUser= User::create([
            "id"=> $id,
            "name"=> $username,
            "email"=> $email,
            "password"=> $password,
            "group_id"=> $group_id
        ]);

        return response()->json($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id) ? User::find($id):  ["exception"=> "not registered yet"];

        return response()->json($user);
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
}
