<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Array para almacenar notas temporalmente (simula base de datos)
    private $notas = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['notas' => $this->notas]);
    }

    // Registra una nueva nota
    public function registrar(Request $request)
    {
        $nota = [
            'titulo' => $request->input('titulo'),
            'categoria' => $request->input('categoria'),
            'contenido' => $request->input('contenido'),
        ];

        // Guardamos temporalmente en el array
        $this->notas[] = $nota;

        return view('welcome', ['notas' => $this->notas]);
    }
}

