<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index'])->name('home');
Route::post('/eventos/agregar', [EventoController::class, 'agregar'])->name('eventos.agregar');
Route::post('/eventos/editar', [EventoController::class, 'editar'])->name('eventos.editar');
Route::post('/eventos/eliminar', [EventoController::class, 'eliminar'])->name('eventos.eliminar');

