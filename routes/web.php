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

Route::prefix('races/{race}')->group(function () {
    Route::get('details/user', [DetailController::class, 'user'])->name('races.details.user');
    Route::get('details', [DetailController::class, 'index'])->name('races.details.index');
    Route::get('details/create', [DetailController::class, 'create'])->name('races.details.create');
    Route::post('details', [DetailController::class, 'store'])->name('races.details.store');
    Route::get('details/{detail}', [DetailController::class, 'show'])->name('races.details.show');
    Route::delete('details/{detail}', [DetailController::class, 'destroy'])->name('races.details.destroy');
    Route::get('details/{detail}/edit', [DetailController::class, 'edit'])->name('races.details.edit');
    Route::put('details/{detail}', [DetailController::class, 'update'])->name('races.details.update');

});

