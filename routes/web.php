<?php


use Illuminate\Support\Facades\Route;

/* Commentaires:

(1) redirection vers la page tableau de bord
(2) aller à un journal en particulier
(3) aller à un écriture en particulier

*/

Route::get('/', function(){return view('welcome');});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // (1)
Route::get('/journals/{id}', App\Http\Livewire\Journal::class)->name('journal.index'); // (2)
Route::get('/writing/create/', App\Http\Livewire\CreateWriting::class)->name('writing.create');
Route::get('/writing/{id}', App\Http\Livewire\Writing::class)->name('writing.show'); // (3)
Route::get('/notifications', App\Http\Livewire\Notifications::class)->name('notifications');
