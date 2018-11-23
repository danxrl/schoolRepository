<?php

$fila = 1;

if(isset($_POST['file_number'])){

    $valor = $_POST['file_number'];

    if (($mnist = fopen("mnist_test.csv", "r")) !== FALSE) {
        while (($datos = fgetcsv($mnist, ",")) !== FALSE) {
            if($fila == $valor){
                $numero = count($datos);
                echo '<table class="table table-sm"><thead><tr><th colspan="28">';
                echo "Número $datos[0] del archivo $fila</th></tr></thead>";
                echo "<tbody><tr>";
                for ($c=1; $c < $numero; $c++) {
                    if (($c % 28) == 0) {
                        echo '<td style="border: hidden" bgcolor="(0,0,' . $datos[$c] . ')">.</td></tr><tr>';
                    } else {
                        echo '<td style="border: hidden" bgcolor="(0,0,' . $datos[$c] . ')"></td>';
                    }
                }
            }
            $fila++;
        }
        fclose($mnist);
    }
} else {
    echo "Error";
}

