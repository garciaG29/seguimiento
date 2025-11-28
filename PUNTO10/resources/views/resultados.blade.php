<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultados de Encuestas</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
    .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    .encuesta { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    .opcion { margin-left: 20px; }
</style>
</head>
<body>
<div class="container">
    <h2>Resultados de Encuestas</h2>

    @if(!empty($encuestas))
        @foreach($encuestas as $encuesta)
            <div class="encuesta">
                <strong>{{ $encuesta['titulo'] }}</strong>
                <ul>
                    @foreach($encuesta['opciones'] as $opcion)
                        <li class="opcion">{{ $opcion }}: {{ count(array_filter($encuesta['respuestas'], fn($r)=>$r==$opcion)) }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endif

    <a href="{{ route('home') }}">Volver al Inicio</a>
</div>
</body>
</html>

