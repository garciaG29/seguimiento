<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoriaController extends Controller
{
    // Array temporal para almacenar puntajes
    private $puntajes = [];

    // Muestra la vista principal
    public function index()
    {
        return view('welcome', ['puntajes' => $this->puntajes]);
    }

    // Inicia un nuevo juego
    public function iniciar(Request $request)
    {
        $nivel = $request->input('nivel'); // Fácil, Medio, Difícil

        // Generar cartas duplicadas según el nivel
        $cantidadCartas = 0;
        switch($nivel){
            case 'Fácil': $cantidadCartas = 6; break;
            case 'Medio': $cantidadCartas = 12; break;
            case 'Difícil': $cantidadCartas = 18; break;
        }

        $cartas = [];
        for ($i = 1; $i <= $cantidadCartas/2; $i++) {
            $cartas[] = "img$i.png";
            $cartas[] = "img$i.png"; // duplicar para emparejar
        }

        shuffle($cartas); // mezclar cartas

        return view('welcome', ['cartas' => $cartas, 'nivel' => $nivel, 'puntajes' => $this->puntajes]);
    }

    // Guardar puntaje del jugador
    public function guardarPuntaje(Request $request)
    {
        $puntaje = $request->input('puntaje');
        $nombre = $request->input('nombre');

        $this->puntajes[] = ['nombre' => $nombre, 'puntaje' => $puntaje];

        return view('welcome', ['puntajes' => $this->puntajes]);
    }
}

