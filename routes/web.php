<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\Auth\LoginController;

/* Commentaires:

(1) redirection vers la page tableau de bord
(2) aller à un journal en particulier
(3) aller à un écriture en particulier

*/

Route::get('/', [LoginController::class, "showLoginForm"]);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/journals', [JournalController::class, 'getAll'])->name("listeJournals");
    Route::get('/writings', [WritingController::class, 'index'])->name("writingsContainer");
    Route::get('/writing/create/', [WritingController::class, "getForm"])->name('writing.form');
    Route::post('/writing/create/', [WritingController::class, "create"])->name('writing.create');
    Route::get('/journal/{id}', [JournalController::class, "index"])->name('journal.index'); // (2)
    Route::get('/journal/detail/{id}', [JournalController::class, "detailEcriture"])->name('journal.index.detail'); // (2)
});
