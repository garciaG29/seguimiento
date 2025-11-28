<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sistema de Reservas</h2>

        <form method="POST" action="{{ route('reservas.registrar') }}">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Tu nombre" required><br><br>

            <label>Servicio:</label>
            <input type="text" name="servicio" placeholder="Ej: Corte de cabello, Masaje" required><br><br>

            <label>Fecha:</label>
            <input type="date" name="fecha" required><br><br>

            <label>Hora:</label>
            <input type="time" name="hora" required><br><br>

            <button type="submit">Reservar</button>
        </form>

        @if(!empty($reservas))
            <h3>Reservas Registradas</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva['nombre'] }}</td>
                            <td>{{ $reserva['servicio'] }}</td>
                            <td>{{ $reserva['fecha'] }}</td>
                            <td>{{ $reserva['hora'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

