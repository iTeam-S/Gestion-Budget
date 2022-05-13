<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\EcritureController;


/*
|-------------------------------------------------------------------------- |
    API Routes
|-------------------------------------------------------------------------- |
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Concernant l'authentification
Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {

    // requetes get
    Route::get('/user', [AuthController::class, 'userInfo']);


    // requetes post
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);


    // requetes put
    Route::put('/reset-password', [AuthController::class, 'resetPassword']);

});


// Concernant les ecritures
Route::group([ 'middleware' => 'api', 'prefix'=> 'ecriture'], function ($router) {

    //requetes get
    Route::get('/', [EcritureController::class, 'getAll']);
    Route::get('/{id}', [EcritureController::class, 'get']);

    //requetes post
    Route::post('/store', [EcritureController::class, 'store']);

    // requetes put
    Route::put('/update/{id}', [EcritureController::class, 'modifier']);

    // requetes delete
    Route::delete('/remove/{id}', [EcritureController::class, 'remove']);


});


// Concernant les journals
Route::group([ 'middleware' => 'api', 'prefix'=> 'journal'], function ($router) {

    //requetes get
    Route::get('/', [JournalController::class, 'getAll']);
    Route::get('/{id}', [JournalController::class, 'get']);

    //requetes post
    Route::post('/store', [JournalController::class, 'store']);

    // requetes put
    Route::put('/update/{id}', [JournalController::class, 'modifier']);

    // requetes delete
    Route::delete('/remove/{id}', [JournalController::class, 'remove']);


});


// Concernant les comptes
Route::group([ 'middleware' => 'api', 'prefix'=> 'compte'], function ($router) {

    //requetes get
    Route::get('/', [CompteController::class, 'getAll']);
    Route::get('/{id}', [CompteController::class, 'get']);

    //requetes post
    Route::post('/store', [CompteController::class, 'store']);

    // requetes put
    Route::put('/update/{id}', [CompteController::class, 'modifier']);

    // requetes delete
    Route::delete('/remove/{id}', [CompteController::class, 'remove']);


});
