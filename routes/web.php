<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\EcritureController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChangePasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/{uri}', function ($url) {

        return Redirect::to('/');

    })->where(['uri' => 'dashboard']);

    Route::get('/', [HomeController::class, 'home']);

    Route::get('journals/{id}', [JournalController::class, "details"])->name('journals.details');
	Route::get('journals', [JournalController::class, "index"])->name('journals');

    Route::post('/ecritures/valider', [EcritureController::class, "valider"])->name("ecritures.valider");
    Route::get('/ecritures', [EcritureController::class, "index"])->name("ecritures");

	Route::get('comptes', function () {
		return view('comptes');
	})->name('comptes');

	Route::get('notifications', [NotificationController::class, "index"])->name('notifications');

    Route::get('/logout', [SessionsController::class, 'destroy']);
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
