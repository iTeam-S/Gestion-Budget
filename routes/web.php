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

Route::get('/', [LoginController::class, "showLoginForm"])->name("login");

Auth::routes();

Route::get('/journals', [JournalController::class, 'getAll'])->name("listeJournals");
Route::get('/writings', [WritingController::class, 'index'])->name("writingsContainer");
Route::get('/journal/{id}/', [JournalController::class, "index"])->name('journal.index'); // (2)
Route::get('/journal/detail/{id}', [JournalController::class, "detailEcriture"])->name('journal.index.detail'); // (2)
Route::get('/writing/create/', App\Http\Livewire\CreateWriting::class)->name('writing.create');
Route::get('/writing/{id}', App\Http\Livewire\Writing::class)->name('writing.show'); // (3)
Route::get('/notifications', App\Http\Livewire\Notifications::class)->name('notifications');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
