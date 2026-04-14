<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetarioController;

Route::get('/', [RecetarioController::class, 'index']);
Route::get('/recetas/{id}', [RecetarioController::class, 'show']);
Route::get('/crear', [RecetarioController::class, 'create']);
Route::post('/crear', [RecetarioController::class, 'store']);