<?php

use Illuminate\Http\Request;
use App\Http\Middleware\EnsureToken;
use Illuminate\Support\Facades\Route;

/* prend en charge la redirection des pages dont les uri sont definies côtés react
même lors du rechargement coté-serveur */
Route::view('/{path?}', 'index');




