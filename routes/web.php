<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetarioController;

Route::name('recetas.')->group(function () {

    Route::get('/', [RecetarioController::class, 'index'])->name('index');

    Route::get('/recetas/{id}', [RecetarioController::class, 'show'])->name('show');

    Route::get('/crear', [RecetarioController::class, 'create'])->name('create');
    Route::post('/crear', [RecetarioController::class, 'store'])->name('store');

    Route::get('/buscar', [RecetarioController::class, 'buscar'])->name('buscar');

});