<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function index(){

        $user= auth()->user();

        $unreadNotifications= $user->unreadNotifications;



        return view("notifications", ["unreadNotifications"=> $unreadNotifications]);
    }
}
