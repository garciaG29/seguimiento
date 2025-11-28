<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    // Array temporal para almacenar encuestas
    private $encuestas = [];

    // Muestra la página principal
    public function index()
    {
        return view('welcome', ['encuestas' => $this->encuestas]);
    }

    // Crear una nueva encuesta
    public function crear(Request $request)
    {
        $encuesta = [
            'id' => uniqid(),
            'titulo' => $request->input('titulo'),
            'opciones' => explode(',', $request->input('opciones')),
            'respuestas' => []
        ];

        $this->encuestas[] = $encuesta;

        return view('welcome', ['encuestas' => $this->encuestas]);
    }

    // Responder encuesta
    public function responder(Request $request)
    {
        $id = $request->input('id');
        $opcion = $request->input('opcion');

        foreach ($this->encuestas as &$encuesta) {
            if ($encuesta['id'] === $id) {
                $encuesta['respuestas'][] = $opcion;
            }
        }

        return view('welcome', ['encuestas' => $this->encuestas]);
    }

    // Mostrar resultados
    public function resultados()
    {
        return view('resultados', ['encuestas' => $this->encuestas]);
    }
}

