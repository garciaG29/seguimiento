<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::get('/', [NotaController::class, 'index'])->name('home');
Route::post('/notas/registrar', [NotaController::class, 'registrar'])->name('notas.registrar');

