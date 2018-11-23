<?php

/*+++++++++++++++++++++++++++++++++++++++++++++++
+                                               +
+   Area de funciones de test del programa      +
+                                               +
+++++++++++++++++++++++++++++++++++++++++++++++*/

// Función que compara si ha llegado al final del array
function finArray($array, $position){
    if ($position == $GLOBALS['size']) {
        return false;
    } else {
        return true;
    }
}

/* Función que ejecuta el autómata
    Cada 'case' que evalua '$GLOBALS['state'] es un estado del automata */
function automata($palabra, $i){
    switch ($GLOBALS['state']) {
        case 1:
            if (ctype_alpha($palabra[$i])) {
                $GLOBALS['state'] = 2;
                return 'identificador';
            } elseif (ctype_digit($palabra[$i])) {
                $GLOBALS['state'] = 3;
                return 'entero';
            } elseif (empty($palabra[$i])) {
                $GLOBALS['state'] = 1;
            } else {
                switch ($palabra[$i]) {
                    case ':':
                        $GLOBALS['state'] = 6;
                        return 'noAceptado';
                        break;

                    case ';':
                        $GLOBALS['state'] = 8;
                        return 'fin';
                        break;

                    case '+':
                        $GLOBALS['state'] = 9;
                        return 'suma';
                        break;

                    default:
                        $GLOBALS['state'] = 99;
                        return 'noAceptado';
                        break;
                }
            }
            break;

        case 2:            
            if (ctype_alpha($palabra[$i]) || ctype_digit($palabra[$i])) {
                $GLOBALS['state'] = 2;
                return 'identificador';
            } else {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;

        case 3:
            if (ctype_digit($palabra[$i])) { 
                $GLOBALS['state'] = 3;
                return 'entero';
            } elseif ($palabra[$i] == '.') {
                $GLOBALS['state'] = 4;
                return 'noAceptado';
            } else {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;

        case 4:
            if (ctype_digit($palabra[$i])) { 
                $GLOBALS['state'] = 5;
                return 'real';
            } else {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;

        case 5:
            if (ctype_digit($palabra[$i])) { 
                $GLOBALS['state'] = 5;
                return 'real';
            } else {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;

        case 6:
            if ($palabra[$i] == '=') {
                $GLOBALS['state'] = 7;
                return 'asignacion';
            } else {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;

        case 7:
            $GLOBALS['state'] = 99;
            return 'noAceptado';
            break;
        
        case 8:
            $GLOBALS['state'] = 99;
            return 'noAceptado';
            break;

        case 9:
            $GLOBALS['state'] = 99;
            return 'noAceptado';
            break;
        
        case 99:
            if (!isset($palabra[$i+1])) {
                $GLOBALS['state'] = 99;
                return 'noAceptado';
            }
            break;
    }
}

// Función que recorre los caracteres de la cadena
function recorrer($palabra){
    // Inicialia la posición actual de la cadena de palabras
    $position = $GLOBALS['position'];
    // Comprueba no haber llegado al final del array
    $finArray = finArray($palabra, $position);

    // Si no ha llegado al final
    if ($finArray) {
        // Inicializa la cadena con la palabra en la posición actual
        $cadena = $palabra[$position];

        // Recorre cada letra de la palabra
        for ($i=0; $i < sizeof($cadena); $i++) {

            //Regresa el resultado evaluado en la letra
            $result = automata($cadena, $i);
        }
        
        // Comprueba el resultado obtenido y lo agrega al indicador
        valores($result);
        // Pasa a la siguiente posición (palabra)
        ++$GLOBALS['position'];
        // Reininicia su estado para evaluar la siguiente palabra
        $GLOBALS['state'] = 1;
        // Evalua la siguiente palabra
        recorrer($palabra);
    }
}

//Función para imprimir los resultados
function results(){
    echo '
        <ul>
        <li>Cantidad de tokens aceptados: ' . $GLOBALS['total'] . '</li>
        <li>Cantidad de tokens No aceptados: ' . $GLOBALS['noAceptado'] . '</li>
        <li>Identificador: ' . $GLOBALS['identificador'] . '</li>
        <li>Real sin signo: ' . $GLOBALS['real'] . '</li>
        <li>Entero sin signo: ' . $GLOBALS['entero'] . '</li>
        <li>Asignación: ' . $GLOBALS['asignacion'] . '</li>
        <li>Fin de sentencia: ' . $GLOBALS['fin'] . '</li>
        <li>Suma: ' . $GLOBALS['suma'] . '</li>
        </ul>    
    ';
}

//Función para atrapar los resultados y asignarlos a los indicadores.
function valores($valor){

    switch ($valor) {
        case 'identificador':
            $GLOBALS['identificador']++;
            $GLOBALS['total']++;
            break;

        case 'entero':
            $GLOBALS['entero']++;
            $GLOBALS['total']++;
            break;

        case 'real':
            $GLOBALS['real']++;
            $GLOBALS['total']++;
            break;

        case 'asignacion':
            $GLOBALS['asignacion']++;
            $GLOBALS['total']++;
            break;

        case 'fin':
            $GLOBALS['fin']++;
            $GLOBALS['total']++;
            break;

        case 'suma':
            $GLOBALS['suma']++;
            $GLOBALS['total']++;
            break;
        
        case 'noAceptado':
            $GLOBALS['noAceptado']++;
            break;
    }
}
