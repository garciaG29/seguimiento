<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoriaController;

Route::get('/', [MemoriaController::class, 'index'])->name('home');
Route::post('/juego/iniciar', [MemoriaController::class, 'iniciar'])->name('juego.iniciar');
Route::post('/juego/guardar-puntaje', [MemoriaController::class, 'guardarPuntaje'])->name('juego.guardarPuntaje');

