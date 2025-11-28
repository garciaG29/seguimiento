<?php

use App\Controllers\TipController;

// Crear instancia de router básico
$router = new class {
    private $routes = [];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Página no encontrada";
            return;
        }

        $action = $this->routes[$method][$uri];

        if (is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];
            return $controller->$method();
        }

        if (is_callable($action)) {
            return $action();
        }
    }
};

// Rutas del proyecto
$router->get('/', [TipController::class, 'index']);
$router->post('/index.php?route=calculate', [TipController::class, 'calculate']);

// Ejecutar router
$router->dispatch();

