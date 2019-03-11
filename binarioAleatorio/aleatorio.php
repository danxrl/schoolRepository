<?php

// Se manda a llamar el archivo que guarda las funciones
require ('functions.php');
$tipo = $_POST['tipo']; // Tipo 1 = encriptar; Tipo 2 = desencriptar;

if (isset($_POST['consulta']) && ($tipo == 1)) {
    //Nombre del archivo de texto
    $docName = 'C:/Users/Danx/Desktop/' . $_POST['consulta'] . '.txt';

    //Inicialización de variables de programa principal
    $texto      = ""; //Inicialización de variable que guardará el texto
    $cadena     = array();
    $aux        = 0;

    //Archivo que se va a leer
    $archivo = fopen($docName,"r") or die ("Error al leer");

    while (!feof($archivo)) {
        // Lee linea por linea el archivo de texto
        $linea = fgets($archivo);
        $texto = trim($linea, "\n\r");

        // Convierte la linea a binario
        $bin = _to_bin($texto);
        // Separa la linea binaria en un array de caracteres binarios
        $letras = _encriptar_linea($bin);
        // Une los caracteres encriptados en una sola lina de texto
        $texto = _unir_linea($letras);
        $cadena[$aux] = $texto;

        $aux++;
    }
    fclose($archivo);

    // Abre el archivo para sobreescribirlo
    $archivo = fopen($docName,"w") or die ("Error al leer");

    // Sobre escribre el archivo linea por linea
    for ($i=0; $i < sizeof($cadena); $i++) {
        $texto = ($i != sizeof($cadena) - 1) ? $cadena[$i] . PHP_EOL : $cadena[$i] ;
        fwrite($archivo, $texto);
    }
    fclose($archivo);

    var_dump($cadena);

} else if (isset($_POST['consulta']) && ($tipo == 2)) {
    //Nombre del archivo de texto
    $docName = 'C:/Users/Danx/Desktop/' . $_POST['consulta'] . '.txt';

    //Inicialización de variables de programa principal
    $texto      = ""; //Inicialización de variable que guardará el texto
    $cadena     = array();
    $aux        = 0;

    //Archivo que se va a leer
    $archivo = fopen($docName,"r") or die ("Error al leer");

    while (!feof($archivo)) {
        // Lee linea por linea el archivo de texto
        $linea = fgets($archivo);
        $texto = trim($linea, "\n\r");

        // Desencriptar los caracteres binarios de la linea
        $caracteres = _desencriptar_linea($texto);
        // Convertir los binarios a letras
        $letras = _to_text($caracteres);

        $cadena[$aux] = $letras;

        $aux++;
    }
    fclose($archivo);

    // Abre el archivo para sobreescribirlo
    $archivo = fopen($docName,"w") or die ("Error al leer");

    // Sobre escribre el archivo linea por linea
    for ($i=0; $i < sizeof($cadena); $i++) {
        $texto = ($i != sizeof($cadena) - 1) ? $cadena[$i] . PHP_EOL : $cadena[$i] ;
        fwrite($archivo, $texto);
    }
    fclose($archivo);

    var_dump($cadena);

} else {
    echo 'No se ha agregado un archivo';
}