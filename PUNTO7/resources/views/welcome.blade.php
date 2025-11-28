<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Eventos</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        input[type=text], input[type=date], input[type=time], textarea { width: 100%; padding: 5px; }
        form { margin-bottom: 20px; }
        button { margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calendario de Eventos</h2>

        <!-- Formulario para agregar evento -->
        <form method="POST" action="{{ route('eventos.agregar') }}">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" required><br><br>

            <label>Fecha:</label>
            <input type="date" name="fecha" required><br><br>

            <label>Hora:</label>
            <input type="time" name="hora" required><br><br>

            <label>Descripción:</label>
            <textarea name="descripcion" rows="3" required></textarea><br><br>

            <button type="submit">Agregar Evento</button>
        </form>

        @if(!empty($eventos))
            <h3>Eventos Registrados</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                        <tr>
                            <td>{{ $evento['titulo'] }}</td>
                            <td>{{ $evento['fecha'] }}</td>
                            <td>{{ $evento['hora'] }}</td>
                            <td>{{ $evento['descripcion'] }}</td>
                            <td>
                                <!-- Formularios para editar y eliminar (simplificados) -->
                                <form method="POST" action="{{ route('eventos.eliminar') }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $evento['id'] }}">
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

