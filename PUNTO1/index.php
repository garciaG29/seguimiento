<?php

// 1. Cargar helper de vistas
require_once __DIR__ . '/core/helpers.php';

// 2. Cargar controladores
require_once __DIR__ . '/controllers/HomeController.php';

// 3. Cargar sistema de rutas
$router = new class {
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Página no encontrada";
            return;
        }

        $action = $this->routes[$method][$uri];

        // Si es controlador y método
        if (is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];
            return $controller->$method();
        }

        // Si es un callback
        if (is_callable($action)) {
            return $action();
        }
    }
};

// 4. Cargar rutas
require_once __DIR__ . '/routes/web.php';

// 5. Ejecutar router
$router->dispatch();
