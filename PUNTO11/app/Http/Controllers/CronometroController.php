<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronometroController extends Controller
{
    // Array temporal para almacenar vueltas
    private $vueltas = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['vueltas' => $this->vueltas]);
    }

    // Guardar vuelta
    public function guardarVuelta(Request $request)
    {
        $tiempo = $request->input('tiempo');
        $this->vueltas[] = $tiempo;

        return view('welcome', ['vueltas' => $this->vueltas]);
    }
}

