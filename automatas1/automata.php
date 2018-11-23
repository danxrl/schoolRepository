<?php

// Se manda a llamar el archivo que guarda las funciones
require ('functions.php');

// Inicialización de variables
$GLOBALS['state']       = 1;
$GLOBALS['position']    = 0;

// Variables contadoras de tokens
$GLOBALS['identificador']   = 0;
$GLOBALS['entero']          = 0;
$GLOBALS['real']            = 0;
$GLOBALS['asignacion']      = 0;
$GLOBALS['fin']             = 0;
$GLOBALS['suma']            = 0;
$GLOBALS['noAceptado']      = 0;
$GLOBALS['total']           = 0;

// Si recibe una cadena inicia el programa
if (isset($_POST['consulta'])) {

    // Asigna valor recibido a la variable
    $consulta = $_POST['consulta'];

    /* Separa la frase colocando cada palabra en un espacio del array
        Entiendase por palabra el conjunto de caracteres separados por un espacio */
    $arrayCadenas = explode(" ",$consulta);

    // Se asigna la cantidad de palabras tomadas de la frase
    $GLOBALS['size'] = sizeof($arrayCadenas);

    // Cada palabra es separada letra por letra en un array de caracteres individuales
    for ($i=0; $i < $size; $i++) {     
        $aux = str_split($arrayCadenas[$i]);
        $arrayCadenas[$i] = $aux;
    }

    // Se ejecuta la función que evaluará la palabra, misma que ejecuta el autómata
    recorrer($arrayCadenas);

    // Muestra los resultados en pantalla
    results();

} 
    // Si no recibe ninguna cadena envía el siguiente mensaje
    else {
    echo 'No ha escrito nada aún.';
}
