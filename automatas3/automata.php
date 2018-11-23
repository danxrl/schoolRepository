<?php

$aux = 0;
$estados = array();
$data_estados = '';
$entrada = array();
$data_entrada = '';
$flujo = array();
$tabla = array();
$newTabla = array();


for ($i=1; $i <= $_POST['num_estados'] ; $i++) { 
    $estados[$i-1] = $_POST['estado'.$i.''];
    $data_estados .= 'estado'.$i.': "'.$estados[$i-1].'",';
    unset($_POST['estado'.$i.'']);
}

for ($i=1; $i <= $_POST['num_entradas'] ; $i++) { 
    $entrada[$i-1] = $_POST['entrada'.$i.''];
    $data_entrada .= 'entrada'.$i.': "'.$entrada[$i-1].'",';
    unset($_POST['entrada'.$i.'']);
}

$num_estados = $_POST['num_estados'];
unset($_POST['num_estados']);
$num_entradas = $_POST['num_entradas'];
unset($_POST['num_entradas']);

foreach ($_POST as $key) {
    $flujo[$aux] = $key;
    $aux++; 
}

$aux = 0;

for ($i=0; $i < $num_estados ; $i++) { 
    //$tabla[$i] = $estados[$i];
    for ($j=0; $j < $num_entradas ; $j++) {
        if ($flujo[$aux] == '') {
            $tabla[$i][$j] = null;
        } else {
            $xd = str_split($flujo[$aux]);
            $tabla[$i][$j] = $xd;
        }
        $aux++;
    }
}
var_dump($estados);
var_dump($flujo);
var_dump($tabla);

foreach ($estados as $estado) {
    foreach($tabla as $row){
        foreach ($row as $value) {
            estados($estado, $tabla);
        }
    }
}

// Funcion de autómata
function estados($estado, $valor){
    if ($valor != $estado) {
        
    }
}
