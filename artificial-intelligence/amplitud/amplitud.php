<?php

require_once('functions.php');
require_once('../sources/data.php');

// Revisa que haya recibido valores para entrar
if (ctype_alpha($_POST['start']) && ctype_alpha($_POST['final'])) {
    // Inicializa nodo inicial y lista de nodos
    $start = strtoupper($_POST['start']);
    $final = strtoupper($_POST['final']);
    
    $arbol = amplitud($start, $final, $data);

    var_dump($arbol);

    print_route($arbol, $start, $final);
    

} else {
    echo 'Ingrese datos validos e intente de nuevo';
}