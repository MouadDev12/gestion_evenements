<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\AtelierController;

Route::get('/', function () {
    return redirect()->route('evenements.index');
});

// Routes pour EvenementController
Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');
Route::get('/evenements/create', [EvenementController::class, 'create'])->name('evenements.create');
Route::post('/evenements', [EvenementController::class, 'store'])->name('evenements.store');
Route::get('/evenements/{id}', [EvenementController::class, 'show'])->name('evenements.show');
Route::delete('/evenements/{id}', [EvenementController::class, 'destroy'])->name('evenements.destroy');

// Experts
Route::get('/experts', [ExpertController::class, 'index'])->name('experts.index');
Route::get('/experts/{id}', [ExpertController::class, 'show'])->name('experts.show');

// Ateliers
Route::get('/ateliers', [AtelierController::class, 'index'])->name('ateliers.index');
