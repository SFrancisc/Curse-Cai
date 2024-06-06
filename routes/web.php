<?php

use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "salut";
});

Route::resource('races', RaceController::class);
