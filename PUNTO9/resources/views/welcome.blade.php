<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Memoria</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        .tablero { display: grid; grid-template-columns: repeat(6, 80px); gap: 10px; margin-top: 20px; }
        .carta { width: 80px; height: 80px; background: #ccc; display: flex; justify-content: center; align-items: center; cursor: pointer; }
        .puntajes { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Juego de Memoria</h2>

        <!-- Selección de nivel -->
        <form method="POST" action="{{ route('juego.iniciar') }}">
            @csrf
            <label>Selecciona Nivel:</label>
            <select name="nivel">
                <option>Fácil</option>
                <option>Medio</option>
                <option>Difícil</option>
            </select>
            <button type="submit">Iniciar Juego</button>
        </form>

        <!-- Tablero de cartas -->
        @isset($cartas)
            <h3>Nivel: {{ $nivel }}</h3>
            <div class="tablero">
                @foreach($cartas as $carta)
                    <div class="carta">{{ $carta }}</div>
                @endforeach
            </div>
        @endisset

        <!-- Puntajes -->
        @if(!empty($puntajes))
            <div class="puntajes">
                <h3>Puntajes</h3>
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puntajes as $p)
                            <tr>
                                <td>{{ $p['nombre'] }}</td>
                                <td>{{ $p['puntaje'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>

