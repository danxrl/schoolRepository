<?php

// Se manda a llamar el archivo que guarda las funciones
require ('functions.php');

if (isset($_POST['consulta'])) {
    //Valor de la frase que se va a leer
    $frase = $_POST['consulta'];

    //Inicialización de variables de programa principal
    $texto      = ""; //Inicialización de variable que guardará el texto
    $cadena     = array();
    $aux        = 0;

    //Se recorre la frase y se guarda el texto en una variable tipo String
    $texto = strtoupper($frase); // Se convierte el texto a minusculas
    $texto = str_split($texto); // Agrega la linea de texto al array
    $cadena[$aux] = $texto; // Agregar el texto al array
    $aux++;

    // Se inicia el programa llamando la función
    $frases = caesar($cadena);

    //Impresión de los resultado en la pantala
    results($frases);
} else {
    echo 'No se ha escrito texto aún';
}
