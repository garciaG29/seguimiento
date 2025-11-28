<?php
/* Punto 3 y 4: Recibir datos por POST, validarlos y mostrarlos */

$nombre = $_POST['nombre'] ?? null;
$email = $_POST['email'] ?? null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">

<h2 class="mb-3">Datos enviados correctamente</h2>

<div class="alert alert-success">
    <strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?><br>
    <strong>Email:</strong> <?= htmlspecialchars($email) ?>
</div>

<a href="index.html" class="btn btn-secondary mt-3">Volver</a>

</body>
</html>
