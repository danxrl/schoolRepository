<?php

/*+++++++++++++++++++++++++++++++++++++++++++++++
+                                               +
+   Area de funciones de test del programa      +
+                                               +
+++++++++++++++++++++++++++++++++++++++++++++++*/

//Función para imprimir en pantalla
function imprimir($letra, $estado){
    /*
    if ($letra != null) {
        echo $letra . ' - ' . $estado . '<br/>'; // Eliminar mensaje de prueba
    }

    if (($estado == '99') && ($letra == null)) {
        echo 'Termino el texto';// Eliminar mensaje de prueba
    } elseif (($estado == '146') && ($letra == null)) {
        echo ' Se agregó una palabra "web" ' . $GLOBALS['webCounter'] . '<br/>'; // Eliminar mensaje de prueba
    } elseif (($estado == '18') && ($letra == null)) {
        echo ' Se agregó una palabra "ebay" ' . $GLOBALS['ebayCounter'] . '<br/>'; // Eliminar mensaje de prueba
    }*/
}

//Función para imprimir los resultados
function results(){
    echo "
        <p> Total de palabras 'web' encontradas:  " . $GLOBALS['webCounter'] . " </p>
        <p> Total de palabras 'ebay' encontradas: " . $GLOBALS['ebayCounter'] . " </p>
    ";
}

//Función que determina si ya no hay más letras que leer
function finalDeCadena($position){

    if ($GLOBALS['longitud'] == $position) {
        imprimir(null, '99');
        return true; //Verdadero si llego al final del array
    }

    return false; //Falso si no ha llegado al final del array
}


/*++++++++++++++++++++++++++++++++++++++++++++++++++
+                                                  +
+   Area de funciones de estados del programa      +
+                                                  +
++++++++++++++++++++++++++++++++++++++++++++++++++*/


//Función del estado 1
function state1($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++; 
                //Llamdda al estado 12
                state12($cadena, $position);
                break;

            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
            
            // Sigma -e -w vuelve al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 12
function state12($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w vuelve al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 135
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 135
                state135($cadena, $position);
                break;
            
            // Sigma -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 135
function state135($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // b envía al estado 146
            case 'b':
                imprimir($cadena[$position], '146');
                $position++;
                //Llamada al estado 146
                state146($cadena, $position);
                break;
            
            // Sigma -b -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 146
function state146($cadena, $position){
    
    $GLOBALS['webCounter']++; // +1 a webCounter
    imprimir(null,'146');
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // a envía al estado 17
            case 'a':
                imprimir($cadena[$position], '17');
                $position++;
                //Llamada al estado 17
                state17($cadena, $position);
                break;
            
            // Sigma -a -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 15
function state15($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // b envía al estado 16
            case 'b':
                imprimir($cadena[$position], '16');
                $position++;
                //Llamada al estado 16
                state16($cadena, $position);
                break;
            
            // Sigma -b -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 16
function state16($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // a envía al estado 17
            case 'a':
                imprimir($cadena[$position], '17');
                $position++;
                //Llamada al estado 17
                state17($cadena, $position);
                break;
            
            // Sigma -a -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 17
function state17($cadena, $position){
    
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // y envía al estado 18
            case 'y':
                imprimir($cadena[$position], '18');
                $position++;
                //Llamada al estado 18
                state18($cadena, $position);
                break;
            
            // Sigma -y -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}

//Función del estado 18
function state18($cadena, $position){
    
    $GLOBALS['ebayCounter']++; // +1 a ebayCounter
    imprimir(null,'18');
    $comp = finalDeCadena($position);

    if (!$comp) {
        switch ($cadena[$position]) {

            // w envía al estado 12
            case 'w':
                imprimir($cadena[$position], '12');
                $position++;
                //Llamdda al estado 12
                state12($cadena, $position);
                break;
    
            // e envía al estado 15
            case 'e':
                imprimir($cadena[$position], '15');
                $position++;
                //Llamdda al estado 15
                state15($cadena, $position);
                break;
    
            // Sigma -e -w envía al estado 1
            default:
                imprimir($cadena[$position], '1');
                $position++;
                state1($cadena, $position);
                break;
        }
    }
}
