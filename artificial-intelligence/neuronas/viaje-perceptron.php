<?php

function z($i1, $w1, $i2, $w2, $b){
    
    $z = (($i1 * $w1) + ($i2 * $w2) + (-1 * $b));

    if ( $z > 0 ) {
        return 1;
    } elseif ( $z <= 0 ) {
        return 0;
    }
}

function neurona($data){

    // Iniciacion de variables
    $counter = 0;
    $finish = false;
    $step = 'init';
    $w1 = rand(0, 20);
    $w2 = rand(0, 20);
    $b = rand(0, 20);
    $n = .3;
    $error = 0;
    foreach ($data as $key => $value) {
        // Variables variable
        $$key = $value;
    }

    do {
        switch ($step) {
            case 'init':
                if ($counter != 0) {
                    $w1 = $w1 + $error * $i1 * $n;
                    $w2 = $w2 + $error * $i2 * $n;
                    $b = $b - $error * $n;
                }
                $step = '1';
                $counter++;
                echo "<p>|| Valores:: w1 => $w1 || w2 => $w2 || b => $b ||  ";
                // if ($counter == 15) {
                //     $finish = true;
                // }
                break;
    
            case '1':
                if (($i1 == 0) && ($i2 == 0)) {
                    $value = z($i1, $w1, $i2, $w2, $b);
                    if ($value == $out[0]) {
                        $finish = true;
                        $viaja = $out[0];
                    } else {
                        echo 'Falló en la salida 1.<br/></p>';
                        $error = $out[0] - $value;
                        $step = 'init';
                    }
                    break;
                }
            
            case '2':
                if (($i1 == 0) && ($i2 == 1)) {
                    $value = z($i1, $w1, $i2, $w2, $b);
                    if ($value == $out[1]) {
                        $finish = true;
                        $viaja = $out[1];
                    } else {
                        echo 'Falló en la salida 2.<br/></p>';
                        $error = $out[1] - $value;
                        $step = 'init';
                    }
                    break;
                }
    
            case '3':
                if (($i1 == 1) && ($i2 == 0)) {
                    $value = z($i1, $w1, $i2, $w2, $b);
                    if ($value == $out[2]) {
                        $finish = true;
                        $viaja = $out[2];
                    } else {
                        echo 'Falló en la salida 3.<br/></p>';
                        $error = $out[2] - $value;
                        $step = 'init';
                    }
                    break;
                }
    
            case '4':
                if (($i1 == 1) && ($i2 == 1)) {
                    $value = z($i1, $w1, $i2, $w2, $b);
                    if ($value == $out[3]) {
                        $finish = true;
                        $viaja = $out[3];
                    } else {
                        echo 'Falló en la salida 4.<br/></p>';
                        $error = $out[3] - $value;
                        $step = 'init';
                    }
                    break;
                }
    
            default:
                echo 'default:: error';
                break;
        }
    } while ($finish == false);

    echo "Veces que buscó: $counter";

    return $viaja;
}