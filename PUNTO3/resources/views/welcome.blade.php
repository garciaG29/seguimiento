<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input[type=number] { width: 60px; }
        .password { margin-top: 20px; font-weight: bold; color: #2d7a2d; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generador de Contraseñas Seguras</h2>
        <form method="POST" action="{{ route('generar') }}">
            @csrf
            <label>Longitud:</label>
            <input type="number" name="longitud" value="12" min="4" max="64"><br><br>

            <label><input type="checkbox" name="mayusculas" checked> Mayúsculas</label><br>
            <label><input type="checkbox" name="numeros" checked> Números</label><br>
            <label><input type="checkbox" name="simbolos" checked> Símbolos</label><br><br>

            <button type="submit">Generar Contraseña</button>
        </form>

        @isset($password)
            <div class="password">
                Contraseña Generada: {{ $password }}
            </div>
        @endisset
    </div>
</body>
</html>

