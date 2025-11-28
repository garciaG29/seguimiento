<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Notas</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        input[type=text], textarea { width: 100%; padding: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestor de Notas</h2>

        <form method="POST" action="{{ route('notas.registrar') }}">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Título de la nota" required><br><br>

            <label>Categoría:</label>
            <input type="text" name="categoria" placeholder="Ej: Trabajo, Personal" required><br><br>

            <label>Contenido:</label>
            <textarea name="contenido" rows="4" placeholder="Escribe tu nota aquí..." required></textarea><br><br>

            <button type="submit">Guardar Nota</button>
        </form>

        @if(!empty($notas))
            <h3>Notas Registradas</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notas as $nota)
                        <tr>
                            <td>{{ $nota['titulo'] }}</td>
                            <td>{{ $nota['categoria'] }}</td>
                            <td>{{ $nota['contenido'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

