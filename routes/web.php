<?php

use App\Http\Controllers\RaceController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\WinnerController;
use App\Http\Controllers\BetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "salut";
});

Route::get('races/user', [RaceController::class, 'user'])->name('races.user');
Route::get('details/user', [DetailController::class, 'user'])->name('details.user');
Route::get('horses/user', [HorseController::class, 'user'])->name('horses.user');
Route::get('winners/user', [WinnerController::class, 'user'])->name('winners.user');

Route::resource('races', RaceController::class);
Route::resource('horses', HorseController::class);
Route::resource('details', DetailController::class);
Route::resource('winners', WinnerController::class);
Route::resource('bets', BetController::class);
