<?php

// Se manda a llamar el archivo que guarda las funciones
require ('functions.php');

if (isset($_POST['consulta'])) {
    //Nombre del archivo de texto
    $docName = 'C:/Users/Danx/Desktop/' . $_POST['consulta'] . '.txt';

    //Inicialización de variables de programa principal
    $texto      = ""; //Inicialización de variable que guardará el texto
    $cadena     = array();
    $aux        = 0;

    //Archivo que se va a leer
    $archivo = fopen($docName,"r") or die ("Error al leer");

    //Se recorre el archivo y se guarda el texto en una variable tipo String
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $texto = trim($linea, "\n\r");
        $texto = strtoupper($texto); // Se convierte el texto a minusculas
        $texto = str_split($texto); // Agrega la linea de texto al array
        $cadena[$aux] = $texto; // Agregar el texto al array
        $aux++;
    }
    fclose($archivo);

    // Se inicia el programa llamando la función
    $frases = caesar($cadena);

    //Impresión de los resultado en la pantala
    results($frases);
} else {
    echo 'No se ha agregado un archivo';
}
