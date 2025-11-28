<?php

require_once "app/models/Alumno.php";

// Verificar si vienen datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $curso = $_POST["curso"];
    $grado = $_POST["grado"];
    $telefono = $_POST["telefono"];

    // Crear un objeto Alumno
    $alumno = new Alumno($nombre, $curso, $grado, $telefono);

    // Guardar los datos en un archivo TXT (para principiantes)
    $archivo = fopen("alumnos.txt", "a");
    fwrite($archivo, $alumno->formatoTexto());
    fclose($archivo);

    echo "Datos guardados correctamente.";
} else {
    echo "Error: no se enviaron datos.";
}

?>
