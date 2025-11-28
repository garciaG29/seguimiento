<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GastoController extends Controller
{
    // Array para almacenar gastos temporalmente (simula base de datos)
    private $gastos = [];

    // Muestra la vista principal
    public function index()
    {
        // Resumen mensual
        $resumen = $this->calcularResumen($this->gastos);
        return view('welcome', ['gastos' => $this->gastos, 'resumen' => $resumen]);
    }

    // Registra un nuevo gasto
    public function registrar(Request $request)
    {
        $gasto = [
            'fecha' => $request->input('fecha'),
            'categoria' => $request->input('categoria'),
            'descripcion' => $request->input('descripcion'),
            'monto' => floatval($request->input('monto')),
        ];

        // Guardamos temporalmente en el array
        $this->gastos[] = $gasto;

        $resumen = $this->calcularResumen($this->gastos);
        return view('welcome', ['gastos' => $this->gastos, 'resumen' => $resumen]);
    }

    // Función para calcular resumen mensual
    private function calcularResumen($gastos)
    {
        $resumen = [];
        foreach ($gastos as $gasto) {
            $mes = date('Y-m', strtotime($gasto['fecha']));
            if (!isset($resumen[$mes])) {
                $resumen[$mes] = 0;
            }
            $resumen[$mes] += $gasto['monto'];
        }
        return $resumen;
    }
}

