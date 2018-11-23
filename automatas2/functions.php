<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++
+                                                  +
+   Area de funciones de estados del programa      +
+                                                  +
++++++++++++++++++++++++++++++++++++++++++++++++++*/


// Función que determina si ya no hay más letras que leer
function finalDeCadena($position){

    if ($GLOBALS['long'] == $position) {
        return true; //Verdadero si llego al final del array
    }

    return false; //Falso si no ha llegado al final del array
}

// Funciòn del estado 1
function state1($cadena, $position){

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state2($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $GLOBALS['result'] = state8('e');
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 2
function state2($cadena, $position){
    
    $GLOBALS['result'] = '<li style="color: #0000ff">Expresión no completada ni aceptada. 2</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state2($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $position++;
                    state3($cadena, $position);
                    break;

                case 'e':
                    $position++;
                    state5($cadena, $position);
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 3
function state3($cadena, $position){

    $GLOBALS['result'] = '<li style="color: #0000ff">Expresión no completada ni aceptada. 3</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state4($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $GLOBALS['result'] = state8('e');
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 4
function state4($cadena, $position){

    $GLOBALS['result'] = '<li style="color: #23c547">Expresión aceptada y formada correctamente. 4</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state4($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $position++;
                    state5($cadena, $position);
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 5
function state5($cadena, $position){

    $GLOBALS['result'] = '<li style="color: #0000ff">Expresión no completada ni aceptada. 5</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state7($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $position++;
                    state6($cadena, $position);
                    break;
                
                case '+':
                    $position++;
                    state6($cadena, $position);
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $GLOBALS['result'] = state8('e');
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 6
function state6($cadena, $position){

    $GLOBALS['result'] = '<li style="color: #0000ff">Expresión no completada ni aceptada. 6</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state7($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $GLOBALS['result'] = state8('e');
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Funciòn del estado 7
function state7($cadena, $position){

    $GLOBALS['result'] = '<li style="color: #23c547">Expresión aceptada y formada correctamente. 7</li>';

    $comp = finalDeCadena($position);

    if (!$comp) {
        
        if (ctype_digit($cadena[$position])) {
            
            $position++;
            state7($cadena, $position);

        } else {
            switch ($cadena[$position]) {
                case '-':
                    $GLOBALS['result'] = state8('-');
                    break;
                
                case '+':
                    $GLOBALS['result'] = state8('+');
                    break;

                case '.':
                    $GLOBALS['result'] = state8('.');
                    break;

                case 'e':
                    $GLOBALS['result'] = state8('e');
                    break;

                default:
                    $GLOBALS['result'] = message(3, $cadena[$position]);
                    break;
            }
        }
    }
}

// Función del estado 8
function state8($caracter){

    $string = '';

    $string .= '<li style="color: #fd0000">No puedes colocar el caracter "' . $caracter . '" aquí.<br/>';
    $string .= 'Expresión formada incorrectamente, no aceptada.</li>';

    return $string;

}

// Función que envía un mensaje de error para caracteres no permitidos
function message($value, $caracter){

    $salida = '';

    switch ($value) {        
        case 3:
            $salida = '<li style="color: #ff8000">Error en la expresión. Caracter "' . $caracter . '" no admitido.</li>';
            break;

        default:
            $salida = 'Error.<br/>';
            break;
    }

    return $salida;
}
