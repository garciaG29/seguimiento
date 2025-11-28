<?php

use App\Controllers\HomeController;

// Ruta principal
$router->get('/', [HomeController::class, 'index']);

