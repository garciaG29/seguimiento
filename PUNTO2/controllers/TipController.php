<?php

namespace App\Controllers;

class TipController
{
    public function index()
    {
        return view('tips/form');
    }

    public function calculate()
    {
        $monto = $_POST['monto'] ?? 0;
        $porcentaje = $_POST['porcentaje'] ?? 0;

        $propina = ($monto * $porcentaje) / 100;
        $total = $monto + $propina;

        return view('tips/result', [
            'monto' => $monto,
            'porcentaje' => $porcentaje,
            'propina' => $propina,
            'total' => $total
        ]);
    }
}
