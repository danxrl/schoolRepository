<?php

// Iniciacion de variables
$tipo = 'or';
if ($tipo == 'and') {
    $out = [0,0,0,1];
} elseif ($tipo == 'or') {
    $out = [0,1,1,1];
}
$counter = 0;
$step = 'init';
$finish = false;
$w1 = rand(0, 100);
$w2 = rand(0, 100);
$b  = rand(0, 100);
$error = 0;
$n = 1;

function z($i1, $w1, $i2, $w2, $b){
    
    $z = (($i1 * $w1) + ($i2 * $w2) + (-1 * $b));
    
    if ( $z > 0 ) {
        return 1;
    } elseif ( $z <= 0 ) {
        return 0;
    }
}

echo "<h2>Neurona tipo $tipo</h2>";

do {
    switch ($step) {
        case 'init':
            if ($counter != 0) {
                $w1 = $w1 + $error * $i1 * $n;
                $w2 = $w2 + $error * $i2 * $n;
            }
            $i1 = 0;
            $i2 = 0;  
            $step = '1';
            $counter++;
            echo "<p>Valores:: w1 => $w1, w2 => $w2, b => $b.<br/>";
            break;

        case '1':
            $value = z($i1, $w1, $i2, $w2, $b); 
            if ($value == $out[0]) {
                $i2 = 1;
                $step = '2';
            } else {
                echo 'Falló en la salida 1.<br/></p>';
                $error = $out[0] - $value;
                $step = 'init';
            }
            break;
        
        case '2':
            $value = z($i1, $w1, $i2, $w2, $b);
            if ($value == $out[1]) {
                $i1 = 1;
                $i2 = 0;
                $step = '3';
            } else {
                echo 'Falló en la salida 2.<br/></p>';
                $error = $out[1] - $value;
                $step = 'init';
            }
            break;

        case '3':
            $value = z($i1, $w1, $i2, $w2, $b);
            if ($value == $out[2]) {
                $i2 = 1;
                $step = '4';
            } else {
                echo 'Falló en la salida 3.<br/></p>';
                $error = $out[2] - $value;
                $step = 'init';
            }
            break;

        case '4':
            $value = z($i1, $w1, $i2, $w2, $b);
            if ($value == $out[3]) {
                echo 'Salida 4 correcta. Ha encontrado los valores<br/></p>';
                $finish = true;
            } else {
                echo 'Falló en la salida 4.<br/></p>';
                $error = $out[3] - $value;
                $step = 'init';
            }
            break;

        default:
            echo 'default:: error';
            break;
    }
} while ($finish == false);
echo "Veces que buscó: $counter";