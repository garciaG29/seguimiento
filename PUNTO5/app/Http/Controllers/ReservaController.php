<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Array para almacenar reservas temporalmente (simula base de datos)
    private $reservas = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['reservas' => $this->reservas]);
    }

    // Registra una nueva reserva
    public function registrar(Request $request)
    {
        $reserva = [
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'servicio' => $request->input('servicio'),
            'nombre' => $request->input('nombre'),
        ];

        // Guardamos temporalmente en el array
        $this->reservas[] = $reserva;

        return view('welcome', ['reservas' => $this->reservas]);
    }
}

