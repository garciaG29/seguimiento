<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Propinas</title>
</head>
<body>
    <h1>Calculadora de Propinas</h1>
    <form action="index.php?route=calculate" method="POST">
        <label>Monto de la cuenta:</label>
        <input type="number" step="0.01" name="monto" required><br><br>

        <label>Porcentaje de propina:</label>
        <input type="number" step="1" name="porcentaje" required><br><br>

        <button type="submit">Calcular</button>
    </form>
</body>
</html>
