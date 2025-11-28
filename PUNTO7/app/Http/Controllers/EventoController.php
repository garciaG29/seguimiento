<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Array para almacenar eventos temporalmente (simula base de datos)
    private $eventos = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['eventos' => $this->eventos]);
    }

    // Agrega un nuevo evento
    public function agregar(Request $request)
    {
        $evento = [
            'id' => uniqid(),
            'titulo' => $request->input('titulo'),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'descripcion' => $request->input('descripcion'),
        ];

        $this->eventos[] = $evento;
        return view('welcome', ['eventos' => $this->eventos]);
    }

    // Edita un evento existente
    public function editar(Request $request)
    {
        foreach ($this->eventos as &$evento) {
            if ($evento['id'] === $request->input('id')) {
                $evento['titulo'] = $request->input('titulo');
                $evento['fecha'] = $request->input('fecha');
                $evento['hora'] = $request->input('hora');
                $evento['descripcion'] = $request->input('descripcion');
            }
        }
        return view('welcome', ['eventos' => $this->eventos]);
    }

    // Elimina un evento
    public function eliminar(Request $request)
    {
        $this->eventos = array_filter($this->eventos, function($evento) use ($request) {
            return $evento['id'] !== $request->input('id');
        });
        return view('welcome', ['eventos' => $this->eventos]);
    }
}

