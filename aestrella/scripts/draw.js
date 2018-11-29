function drawGrid() {
    // generar el lienzo
    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            ctx.beginPath();
            ctx.strokeStyle = '#DBDAD6';
            ctx.rect(i*tamano, j*tamano, tamano, tamano);
            ctx.stroke();
        }
    }
}

function drawPlayer(jugador, color) {
    ctx.fillStyle = color;
    ctx.fillRect(jugador.x*tamano, jugador.y*tamano, tamano, tamano);
}

function PintarMapaObstaculos() {
    for (let x = 0; x < lienzo.length; x++) {
        for (let y = 0; y < lienzo[x].length; y++) {
            if(lienzo[x][y] === 1) {
                ctx.fillStyle = getRandomColor();
                ctx.fillRect(x*tamano, y*tamano, tamano, tamano);
            }
        }
    }
}

function getRandomColor() {
    let colors = [
        '#FFC300',
        '#FF5733',
        '#C70039',
        '#900C3F',
        '#581845'
    ];
    let color = colors[Math.floor(Math.random() * colors.length)];    
    return color;
  }
  