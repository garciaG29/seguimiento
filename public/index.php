<?php
// FRONT CONTROLLER 

// Cargar el controlador 
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$method     = isset($_GET['method']) ? $_GET['method'] : 'index';

// Armar el nombre de archivo del controlador
$controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

if (!file_exists($controllerFile)) {
    die("Controlador no encontrado: $controller");
}

require_once $controllerFile;

// Construir nombre de la clase
$controllerClass = ucfirst($controller) . "Controller";

// Crear instancia
$controllerObject = new $controllerClass();

// Validar método
if (!method_exists($controllerObject, $method)) {
    die("Método no encontrado en el controlador: $method");
}

// Ejecutar método
$controllerObject->$method();

