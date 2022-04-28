<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error'=>'User is not registered!']);
        }
        if (empty($request->email)||empty($request->password)) {
            return response()->json(['error'=>'Email or Password must not be empty!']);
        }
        if (!\Hash::check($request->password, $user->password)) {
            return response()->json(['error'=>'Ooops! credentials do not match!']);
        }
        if (\Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['success'=>'Login Successful!']);
        }

        return response()->json(['error'=>'Ooops! something went wrong!']);
    }
}
