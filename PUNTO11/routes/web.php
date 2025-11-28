<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronometroController;

Route::get('/', [CronometroController::class, 'index'])->name('home');
Route::post('/cronometro/guardar-vuelta', [CronometroController::class, 'guardarVuelta'])->name('cronometro.guardarVuelta');

