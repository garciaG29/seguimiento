<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

Route::get('/', [RecetaController::class, 'index'])->name('home');
Route::post('/recetas/agregar', [RecetaController::class, 'agregar'])->name('recetas.agregar');
Route::get('/recetas/buscar', [RecetaController::class, 'buscar'])->name('recetas.buscar');

