<?php

require('functions.php');

// Inicialización de variables del automata
$GLOBALS['long'] = 0;
$GLOBALS['result'] = '';
$position = 0;
$cadena = '';

// Comprueba que haya recibido algún caracter
if (isset($_POST['consulta'])) {
    
    $cadena = $_POST['consulta'];

    // Pasamos la cadena a un array
    $cadena = str_split(strtolower($cadena));

    // Tomamos el tamaño del array
    $GLOBALS['long'] = sizeof($cadena);

    // Llamada del estado 1 - Inicio del programa
    state1($cadena, $position);

    echo $GLOBALS['result'];

} else {

    echo 'No hay nada escrito aún.';
}
