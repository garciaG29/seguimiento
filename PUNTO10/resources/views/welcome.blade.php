<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plataforma de Encuestas</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
    .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    form { margin-bottom: 20px; }
    input[type=text] { width: 100%; padding: 5px; margin-bottom: 10px; }
    button { padding: 5px 10px; }
    .encuesta { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    .opciones button { margin-right: 5px; margin-top: 5px; }
</style>
</head>
<body>
<div class="container">
    <h2>Plataforma de Encuestas</h2>

    <!-- Formulario para crear encuesta -->
    <form method="POST" action="{{ route('encuestas.crear') }}">
        @csrf
        <label>Título de la Encuesta:</label>
        <input type="text" name="titulo" required>

        <label>Opciones (separadas por coma):</label>
        <input type="text" name="opciones" placeholder="Ej: Sí, No, Tal vez" required>

        <button type="submit">Crear Encuesta</button>
    </form>

    <!-- Listado de encuestas -->
    @if(!empty($encuestas))
        <h3>Encuestas Disponibles</h3>
        @foreach($encuestas as $encuesta)
            <div class="encuesta">
                <strong>{{ $encuesta['titulo'] }}</strong>
                <div class="opciones">
                    <form method="POST" action="{{ route('encuestas.responder') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $encuesta['id'] }}">
                        @foreach($encuesta['opciones'] as $opcion)
                            <button type="submit" name="opcion" value="{{ $opcion }}">{{ $opcion }}</button>
                        @endforeach
                    </form>
                </div>
                <p>Respuestas: {{ count($encuesta['respuestas']) }}</p>
            </div>
        @endforeach
    @endif

    <a href="{{ route('encuestas.resultados') }}">Ver Resultados</a>
</div>
</body>
</html>

