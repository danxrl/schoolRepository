<?php

/*+++++++++++++++++++++++++++++++++++++++++++++++
+                                               +
+   Area de funciones de test del programa      +
+                                               +
+++++++++++++++++++++++++++++++++++++++++++++++*/

//Función para imprimir los resultados
function results($frases) {
    foreach ($frases as $frase) {
        echo "<p>$frase<p>";
    }
}

/*++++++++++++++++++++++++++++++++++++++++++++++++++
+                                                  +
+   Area de funciones de estados del programa      +
+                                                  +
++++++++++++++++++++++++++++++++++++++++++++++++++*/

//Función que hace el  cifrado del César
function caesar($cadena) {
    $cifrado = '';
    $frases = [];
    for ($j=0; $j < sizeof($cadena); $j++) { 
        for ($i=0; $i < sizeof($cadena[$j]) ; $i++) { 
            $resultado = $cadena[$j][$i];
            for ($aux=128; $aux >= 0 ; $aux--) {
                $letra = chr($aux);
                if ($resultado === $letra) {
                    $aux = $aux - 3;
                    $letraCifrada = chr($aux);
                    $cifrado = $cifrado . $letraCifrada;
                }
            }
        }
        array_push($frases, $cifrado);
        $cifrado = '';
    }
    return $frases;
}
