<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Gastos</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        .resumen { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestor de Gastos</h2>

        <form method="POST" action="{{ route('gastos.registrar') }}">
            @csrf
            <label>Fecha:</label>
            <input type="date" name="fecha" required><br><br>

            <label>Categoría:</label>
            <input type="text" name="categoria" placeholder="Ej: Comida, Transporte" required><br><br>

            <label>Descripción:</label>
            <input type="text" name="descripcion" placeholder="Detalle del gasto" required><br><br>

            <label>Monto:</label>
            <input type="number" name="monto" step="0.01" required><br><br>

            <button type="submit">Registrar Gasto</button>
        </form>

        @if(!empty($gastos))
            <h3>Gastos Registrados</h3>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto['fecha'] }}</td>
                            <td>{{ $gasto['categoria'] }}</td>
                            <td>{{ $gasto['descripcion'] }}</td>
                            <td>${{ number_format($gasto['monto'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(!empty($resumen))
            <div class="resumen">
                <h3>Resumen Mensual</h3>
                <ul>
                    @foreach($resumen as $mes => $total)
                        <li>{{ $mes }}: ${{ number_format($total, 2) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>

