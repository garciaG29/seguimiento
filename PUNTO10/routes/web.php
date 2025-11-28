<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController;

Route::get('/', [EncuestaController::class, 'index'])->name('home');
Route::post('/encuestas/crear', [EncuestaController::class, 'crear'])->name('encuestas.crear');
Route::post('/encuestas/responder', [EncuestaController::class, 'responder'])->name('encuestas.responder');
Route::get('/encuestas/resultados', [EncuestaController::class, 'resultados'])->name('encuestas.resultados');

