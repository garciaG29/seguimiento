<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    // Array para almacenar recetas temporalmente (simula base de datos)
    private $recetas = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['recetas' => $this->recetas]);
    }

    // Agrega una nueva receta
    public function agregar(Request $request)
    {
        $receta = [
            'id' => uniqid(),
            'titulo' => $request->input('titulo'),
            'tipo' => $request->input('tipo'),
            'ingredientes' => $request->input('ingredientes'),
            'instrucciones' => $request->input('instrucciones'),
        ];

        $this->recetas[] = $receta;
        return view('welcome', ['recetas' => $this->recetas]);
    }

    // Busca recetas por título, tipo o ingredientes
    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $filtradas = array_filter($this->recetas, function($receta) use ($query) {
            return stripos($receta['titulo'], $query) !== false ||
                   stripos($receta['tipo'], $query) !== false ||
                   stripos($receta['ingredientes'], $query) !== false;
        });

        return view('welcome', ['recetas' => $filtradas]);
    }
}

