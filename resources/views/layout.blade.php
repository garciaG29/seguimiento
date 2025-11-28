<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Proyecto Laravel - Ejercicios MVC</title>
</head>
<body>
    <h1>Ejercicios MVC - Proyecto en desarrollo</h1>

    <ul>
        <li><a href="/">Inicio</a></li>
        <li><a href="/tareas">Lista de Tareas</a></li>
        <li><a href="/propinas">Calculadora Propinas</a></li>
        <li><a href="/password">Generar Contraseña</a></li>
    </ul>

    <hr>

    <!-- Aquí se insertará contenido dinámico -->
    @yield('content')

</body>
</html>
