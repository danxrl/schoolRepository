<?php

// Se manda a llamar el archivo que guarda las funciones
require ('functions.php');

if (isset($_POST['consulta'])) {
    //Nombre del archivo de texto
    $docName = 'C:/Users/Danx/Desktop/' . $_POST['consulta'] . '.txt';

    //Inicialización de variables de programa principal
    $position   = 0; //Posición en el array
    $texto      = ""; //Inicialización de variable que guardará el texto
    $cadena     = array();
    $aux        = 0;

    //Variables globales
    $GLOBALS['webCounter']  = 0; //Contador de palabra 'web'
    $GLOBALS['ebayCounter'] = 0; //Contador de palabra 'ebay'
    $GLOBALS['longitud']    = 0;

    //Archivo que se va a leer
    $archivo = fopen($docName,"r") or die ("Error al leer");

    //Se recorre el archivo y se guarda el texto en una variable tipo String
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $texto = trim($linea, "\n\r");
        $texto = str_replace(' ','',$texto); // Se eliminan espacios de la cadena
        $texto = strtolower($texto); // Se convierte el texto a minusculas
        $texto = str_split($texto); // Agrega la linea de texto al array
        if ($texto[0] != '') {
            //var_dump($texto);
            $cadena[$aux] = $texto; // Agregar el texto al array
            $aux++;
        }
    }
    fclose($archivo);

    foreach ($cadena as $cadenas) {
        //Se obtiene la longitud total de la cadena de texto
        $GLOBALS['longitud'] = sizeof($cadenas);
    
        // Inicio del programa llamando al estado inicial (State 1)
        state1($cadenas, $position);
    }

    //Impresión de los resultado en la pantala
    results();
} else {
    echo 'No se ha agregado un archivo';
}
