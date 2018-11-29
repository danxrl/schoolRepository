
function update() {
	ctx.clearRect(0, 0, tamano * filas, tamano * columnas);
	drawGrid();
	PintarMapaObstaculos();
	drawPlayer(final, "#12F960");
	drawPlayer(inicial, "#1281F9");
	window.requestAnimationFrame(update);
}

