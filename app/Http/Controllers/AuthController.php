<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    /**
     * Constructeur de notre controller d'authentification
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', "dashboard"]]);
    }

    /**
     * Obtention de jwt generer par authentification
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){



        $validator = Validator::make($request->all(), [
            'prenom_usuel' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = Auth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);

        }
        return $this->createNewToken($token);

    }


    /**
     * Creation d'un utilisateur
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'nom' => 'required|string|max:50',
            'prenom'=> 'required|string|max:50',
            'prenom_usuel'=> 'required|string|max:50|unique:users',
            'user_pic'=> 'required|string|max:255',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6',
            'groupe_id'=> 'required|integer'
        ]);


        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        // array_merge fusionne les tableaux en un seul tableau
        $user = User::create(array_merge( $validator->validated(), [
            'password' => Hash::make($request->password)
        ] ));

        return response()->json([ 'message' => 'Utilisateur créer', 'user' => $user ], 201);
    }

    /**
     * Creation d'un utilisateur
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request){


        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|exclude',
        ]);

        if(! Hash::check($request->password, auth()->user()->password)){

            return response()->json(["erreur"=> "mot de passe incorrecte"], 403);
        }

        auth()->user()->update(["password"=> Hash::make($request->new_password)]);


        return response()->json(["response"=> "mot de passe changé"]);

    }

    /**
     * Déconnexion(et si invalide token)
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Deconnexion reussie']);
    }

    /**
     * Renouvelle le token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * retourne l'utilisateur authentifié
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfo() {
        return response()->json(auth()->user());
    }


    /**
     * creer une nouvelle JWT
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}

