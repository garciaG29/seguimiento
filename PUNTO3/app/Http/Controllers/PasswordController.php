<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // Muestra la vista principal
    public function index()
    {
        return view('welcome');
    }

    // Genera la contraseña
    public function generar(Request $request)
    {
        $longitud = $request->input('longitud', 12); // por defecto 12
        $mayusculas = $request->input('mayusculas', true);
        $numeros = $request->input('numeros', true);
        $simbolos = $request->input('simbolos', true);

        $caracteres = 'abcdefghijklmnopqrstuvwxyz';
        if($mayusculas) $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($numeros) $caracteres .= '0123456789';
        if($simbolos) $caracteres .= '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $password = '';
        $max = strlen($caracteres) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[random_int(0, $max)];
        }

        return view('welcome', ['password' => $password]);
    }
}

