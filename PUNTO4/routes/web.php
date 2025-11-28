<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GastoController;

Route::get('/', [GastoController::class, 'index'])->name('home');
Route::post('/gastos/registrar', [GastoController::class, 'registrar'])->name('gastos.registrar');

