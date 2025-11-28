<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        // Esto carga la vista home.blade.php
        return view('home');
    }
}
