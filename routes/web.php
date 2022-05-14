<?php

use Illuminate\Http\Request;
use App\Http\Middleware\EnsureToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\routes\CompteController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\routes\JournalController;
use App\Http\Controllers\routes\EcritureController;
use App\Http\Controllers\routes\NotificationController;



Route::group(['middleware' => 'guest'], function (){
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::group(['middleware' => 'ensure_token'], function(){

    Route::get('/', function (){return Redirect::to('/dashboard');});
    Route::get('/dashboard', [HomeController::class, 'home'])->name("dashboard");
    Route::get('/logout', [SessionsController::class, 'destroy']);

    Route::get('journals/{id}', [JournalController::class, "details"])->name('journals.details');
	Route::get('journals', [JournalController::class, "index"])->name('journals');

    Route::post('/ecritures/valider', [EcritureController::class, "valider"])->name("ecritures.valider");
    Route::get('/ecritures', [EcritureController::class, "index"])->name("ecritures");

	Route::get('comptes', [CompteController::class, "index"])->name('comptes');

	Route::get('notifications', [NotificationController::class, "index"])->name('notifications');
});

