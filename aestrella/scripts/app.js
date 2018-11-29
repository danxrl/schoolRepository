let filas = 30; // Y
let columnas = 30; // X
let tamano = 15; // px
let lienzo = new Array(filas);
let ctx;
let teclado = null;
let canvas;

var ix = 0;

function cambiarValores() {
    ix =  $("#ix").val() || 0;
}
console.log(ix)    

let inicial = {
    x: ix,
    y: 0
};
let final = {
    x: 29,
    y: 29
}

let ruta = [];
let A_estrella = new Estrella();


function setup() {
    canvas = document.getElementById("canvas");
    canvas.width = filas * tamano;
    canvas.height = columnas * tamano;

    canvas.addEventListener("click", (e) => {
        Click(e, canvas)
    }, false);

    ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, tamano * filas, tamano * columnas);

    // generar el lienzo
    for (let i = 0; i < filas; i++) {
        lienzo[i] = new Array(columnas);
        for (let j = 0; j < columnas; j++) {
            lienzo[i][j] = 0;
        }
    }

    // Poner muros
    lienzo = mapaOriginal;
    lienzo = (localStorage.getItem("lienzo") != null) ? JSON.parse(localStorage.getItem("lienzo")) : lienzo;

    // carga el udpate
    update();
}

function Busqueda() {

    A_estrella.set(inicial, final, lienzo);
    ruta = A_estrella.mapear();
    ruta.reverse();

    let tiempoRecorrido = 0;
    let tiempo = setInterval(() => {

        if (tiempoRecorrido >= ruta.length - 1) {
            clearInterval(tiempo);
        }
        inicial.x = ruta[tiempoRecorrido][0];
        inicial.y = ruta[tiempoRecorrido][1];

        tiempoRecorrido++;
    }, 100);

}

function resetearMapa() {
    localStorage.clear();
    location.reload();
    Busqueda();
}

window.addEventListener("load", setup, false);