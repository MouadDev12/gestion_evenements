<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour EvenementController
Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');
Route::get('/evenements/{id}', [EvenementController::class, 'show'])->name('evenements.show');
Route::delete('/evenements/{id}', [EvenementController::class, 'destroy'])->name('evenements.destroy');
