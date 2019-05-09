<?php

$regla_controller = new ReglaController();
$regla_data = $regla_controller->obtener_clausulas();

$hechos = $_POST;
unset($hechos['r']);
unset($hechos['crud']);
$esValida = adelante($hechos, $regla_data);

function adelante($hechos, $reglas, $c = 'Arte') {
	$regla_controller = new ReglaController();

    // contiene pares de simbolos por regla.
	$cuenta = [];
	foreach ($reglas['atomos'] as $key => $regla) { $cuenta[$key] = sizeof($regla); }
    // contiene los simbolos que ya fueron inferidos
    $inferidos = [];
    // Lista de cola con los simbolos que sabemos que son verdaderos
    $agenda = $hechos;

    while (sizeof($agenda) != 0) {
        $p = array_pop($agenda);
        /* var_dump($c);
        var_dump($p); */
		if ($p == $c) { $response = true; break; }
		$inferidos[$p] = false;
        if ($inferidos[$p] === false) {
			$inferidos[$p] = true;
			foreach ($reglas['atomos'] as $key => $regla) {
				for ($i=0; $i < sizeof($regla); $i++) {
					if ($p == $regla[$i]) {
						$cuenta[$key]--;
						if ($cuenta[$key] === 0) {
							$clave = $key + 1;
							$nuevaP = $regla_controller->read_one($clave);
							var_dump($nuevaP);
						}
					}
				}
			}
		}
		$response = false;
	}
	return $response;
}