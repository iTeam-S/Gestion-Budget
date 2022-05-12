<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::group([ 'middleware' => 'api'], function ($router) {

    //requetes get
    Route::get('/ecritures', [EcritureController::class, 'getAll']);
    Route::get('/ecriture/{id}', [EcritureController::class, 'get']);

    //requetes post
    Route::get('/ecriture/store', [EcritureController::class, 'store']);

    // requetes put
    Route::put('/ecriture/update/{id}', [EcritureController::class, 'update']);

    // requetes delete
    Route::delete('/ecriture/remove/{id}', [EcritureController::class, 'remove']);


});


// Concernant les journals
Route::group([ 'middleware' => 'api'], function ($router) {

    //requetes get
    Route::get('/journals', [JournalController::class, 'getAll']);
    Route::get('/journal/{id}', [JournalController::class, 'get']);

    //requetes post
    Route::get('/journal/store', [JournalController::class, 'store']);

    // requetes put
    Route::put('/journal/update/{id}', [JournalController::class, 'update']);

    // requetes delete
    Route::put('/journal/remove/{id}', [JournalController::class, 'remove']);


});


// Concernant les comptes
Route::group([ 'middleware' => 'api'], function ($router) {

    //requetes get
    Route::get('/comptes', [CompteController::class, 'getAll']);
    Route::get('/compte/{id}', [CompteController::class, 'get']);

    //requetes post
    Route::post('/compte/store', [CompteController::class, 'store']);

    // requetes put
    Route::put('/compte/update/{id}', [CompteController::class, 'update']);

    // requetes delete
    Route::delete('/compte/remove/{id}', [CompteController::class, 'remove']);


});
