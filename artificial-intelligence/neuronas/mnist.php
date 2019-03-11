<?php

$fila = 1;

if(isset($_POST['file_number'])){

    $valor = $_POST['file_number'];

    if (!($valor < 1) && !($valor > 10000)) {
        if (($mnist = fopen("mnist_test.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($mnist, ",")) !== FALSE) {
                if($fila == $valor){
                    $numero = count($datos);
                    echo '<table class="table table-sm"><thead><tr><th colspan="28">';
                    echo "Imagen $fila. Número: $datos[0]</th></tr></thead>";
                    echo "<tbody><tr>";
                    for ($c=1; $c < $numero; $c++) {
                        if (($c % 28) == 0) {
                            echo '<td class="h" style="border: hidden" bgcolor="(0,0,' . $datos[$c] . ')">.</td></tr><tr>';
                        } else {
                            echo '<td class="h" style="border: hidden" bgcolor="(0,0,' . $datos[$c] . ')"></td>';
                        }
                    }
                    echo "</tbody></table>";
                }
                $fila++;
            }
            fclose($mnist);
        }
    } else {
        echo '<h1>Ingrese un valor entre 1 y 10000</h1>';
    }

} else {
    echo "Error";
}

