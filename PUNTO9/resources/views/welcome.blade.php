<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Juego de Memoria</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 50px; }
    .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    .tablero { display: grid; gap: 10px; margin-top: 20px; justify-content: center; }
    .carta { width: 80px; height: 80px; background: #ccc; display: flex; justify-content: center; align-items: center; cursor: pointer; font-weight: bold; font-size: 20px; }
    .carta.volteada { background: #4caf50; color: white; }
    .puntajes { margin-top: 20px; }
</style>
</head>
<body>
<div class="container">
    <h2>Juego de Memoria</h2>

    <!-- Selección de nivel -->
    <form id="formNivel">
        <label>Selecciona Nivel:</label>
        <select id="nivel">
            <option>Fácil</option>
            <option>Medio</option>
            <option>Difícil</option>
        </select>
        <button type="submit">Iniciar Juego</button>
    </form>

    <!-- Tablero -->
    <div id="tablero" class="tablero"></div>

    <!-- Puntaje -->
    <div class="puntajes">
        <h3>Puntaje: <span id="puntaje">0</span></h3>
    </div>
</div>

<script>
let cartas = [];
let primeraCarta = null;
let segundaCarta = null;
let puntaje = 0;
let bloqueando = false;

const tablero = document.getElementById('tablero');
const puntajeSpan = document.getElementById('puntaje');

document.getElementById('formNivel').addEventListener('submit', function(e){
    e.preventDefault();
    iniciarJuego();
});

function iniciarJuego(){
    const nivel = document.getElementById('nivel').value;
    let cantidad = 6; // Fácil
    if(nivel === 'Medio') cantidad = 12;
    if(nivel === 'Difícil') cantidad = 18;

    cartas = [];
    for(let i=1; i<=cantidad/2; i++){
        cartas.push(i);
        cartas.push(i);
    }
    cartas.sort(()=>Math.random()-0.5);

    tablero.innerHTML = '';
    puntaje = 0;
    puntajeSpan.textContent = puntaje;

    const columnas = Math.min(cantidad/2, 6);
    tablero.style.gridTemplateColumns = `repeat(${columnas}, 80px)`;

    cartas.forEach((num, index) => {
        const div = document.createElement('div');
        div.classList.add('carta');
        div.dataset.numero = num;
        div.addEventListener('click', voltearCarta);
        tablero.appendChild(div);
    });
}

function voltearCarta(){
    if(bloqueando) return;
    if(this.classList.contains('volteada')) return;

    this.textContent = this.dataset.numero;
    this.classList.add('volteada');

    if(!primeraCarta){
        primeraCarta = this;
        return;
    }

    segundaCarta = this;
    bloqueando = true;

    if(primeraCarta.dataset.numero === segundaCarta.dataset.numero){
        puntaje++;
        puntajeSpan.textContent = puntaje;
        resetCartas();
    } else {
        setTimeout(() => {
            primeraCarta.textContent = '';
            segundaCarta.textContent = '';
            primeraCarta.classList.remove('volteada');
            segundaCarta.classList.remove('volteada');
            resetCartas();
        }, 1000);
    }
}

function resetCartas(){
    [primeraCarta, segundaCarta] = [null, null];
    bloqueando = false;
}
</script>
</body>
</html>

