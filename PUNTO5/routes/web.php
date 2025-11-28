<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [ReservaController::class, 'index'])->name('home');
Route::post('/reservas/registrar', [ReservaController::class, 'registrar'])->name('reservas.registrar');

