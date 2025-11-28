<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cronómetro Online</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
    .container { max-width: 400px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    h2 { text-align: center; }
    #tiempo { font-size: 48px; text-align: center; margin-bottom: 20px; }
    button { padding: 10px 15px; margin: 5px; }
    ul { margin-top: 20px; }
</style>
</head>
<body>
<div class="container">
    <h2>Cronómetro Online</h2>
    <div id="tiempo">00:00:00</div>
    <div>
        <button id="iniciar">Iniciar</button>
        <button id="pausar">Pausar</button>
        <button id="reiniciar">Reiniciar</button>
        <button id="vuelta">Registrar Vuelta</button>
    </div>

    <h3>Vueltas Registradas</h3>
    <ul id="listaVueltas">
        @if(!empty($vueltas))
            @foreach($vueltas as $vuelta)
                <li>{{ $vuelta }}</li>
            @endforeach
        @endif
    </ul>
</div>

<script>
let horas = 0, minutos = 0, segundos = 0;
let intervalo = null;

const tiempoDiv = document.getElementById('tiempo');
const listaVueltas = document.getElementById('listaVueltas');

function actualizarTiempo() {
    segundos++;
    if(segundos === 60){ segundos = 0; minutos++; }
    if(minutos === 60){ minutos = 0; horas++; }

    tiempoDiv.textContent = 
        String(horas).padStart(2,'0') + ':' +
        String(minutos).padStart(2,'0') + ':' +
        String(segundos).padStart(2,'0');
}

document.getElementById('iniciar').addEventListener('click', () => {
    if(!intervalo) intervalo = setInterval(actualizarTiempo, 1000);
});

document.getElementById('pausar').addEventListener('click', () => {
    clearInterval(intervalo);
    intervalo = null;
});

document.getElementById('reiniciar').addEventListener('click', () => {
    clearInterval(intervalo);
    intervalo = null;
    horas = minutos = segundos = 0;
    tiempoDiv.textContent = "00:00:00";
});

document.getElementById('vuelta').addEventListener('click', () => {
    const tiempoActual = tiempoDiv.textContent;
    const li = document.createElement('li');
    li.textContent = tiempoActual;
    listaVueltas.appendChild(li);

  
});
</script>
</body>
</html>

