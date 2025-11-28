<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento Alumno</title>
</head>
<body>
    <h1>Registro de Alumno</h1>

    <form action="../../process.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Curso:</label><br>
        <input type="text" name="curso" required><br><br>

        <label>Grado:</label><br>
        <input type="text" name="grado" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
