<?php

require_once('functions.php');
require_once('../sources/data.php');

// Revisa que haya recibido valores para entrar
if (ctype_alpha($_POST['start']) && ctype_alpha($_POST['final']) && ctype_digit($_POST['limite'])) {
    // Inicializa nodo inicial y lista de nodos
    $start = strtoupper($_POST['start']);
    $final = strtoupper($_POST['final']);
    $limite = strtoupper($_POST['limite']);
    
    $limite++;

    $arbol = profundidad($start, $final, $data, $limite);

    if ($arbol) {
        print_route($arbol, $start, $final);
    } else {
        echo 'No se encontró el nodo en la profundidad seleccionada';
    }

    // var_dump($arbol);

} else {
    echo 'Ingrese datos validos e intente de nuevo';
}