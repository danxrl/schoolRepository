<?php

require('functions.php');
// require_once('../sources/data.php');
require_once('../sources/airports.php');

// Revisa que haya recibido valores para entrar
if (ctype_alpha($_POST['start']) && ctype_alpha($_POST['final'])) {
    // Inicializa nodo inicial y lista de nodos
    $start = strtoupper($_POST['start']);
    $final = strtoupper($_POST['final']);
    
    $nodeList = node_list($data);
    
    $startData = array(
        'vert' => $start,
        'temp' => 0,
        'final' => 0,
        'root' => $start
    );

    $nodeList = new_values($nodeList, $start, $startData);
    
    $nodeList = dijkstra($nodeList, $data, $start, $final);

    // var_dump($nodeList);
    
    print_route($nodeList);

} else {
    echo 'Ingrese datos validos e intente de nuevo';
}