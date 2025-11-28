<?php
// Punto 3: Capturar datos

$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';

// Punto 4: Mostrar datos en pantalla 
echo "<h2>Datos recibidos:</h2>";
echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
echo "Email: " . htmlspecialchars($email) . "<br>";
?>
