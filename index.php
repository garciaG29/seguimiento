<?php

// Cargar el controlador
require_once "controllers/AlumnoController.php";

// Crear instancia del controlador
$controller = new AlumnoController();

// Llamar el método principal
$controller->index();

?>
