<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Recetas</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        input[type=text], textarea { width: 100%; padding: 5px; margin-bottom: 10px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Plataforma de Recetas</h2>

        <!-- Formulario para agregar receta -->
        <form method="POST" action="{{ route('recetas.agregar') }}">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" required><br>

            <label>Tipo de comida:</label>
            <input type="text" name="tipo" placeholder="Ej: Desayuno, Cena" required><br>

            <label>Ingredientes:</label>
            <textarea name="ingredientes" rows="3" placeholder="Separar ingredientes por comas" required></textarea><br>

            <label>Instrucciones:</label>
            <textarea name="instrucciones" rows="3" required></textarea><br>

            <button type="submit">Agregar Receta</button>
        </form>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('recetas.buscar') }}">
            <input type="text" name="q" placeholder="Buscar por título, tipo o ingredientes">
            <button type="submit">Buscar</button>
        </form>

        @if(!empty($recetas))
            <h3>Recetas Registradas</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Ingredientes</th>
                        <th>Instrucciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recetas as $receta)
                        <tr>
                            <td>{{ $receta['titulo'] }}</td>
                            <td>{{ $receta['tipo'] }}</td>
                            <td>{{ $receta['ingredientes'] }}</td>
                            <td>{{ $receta['instrucciones'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

