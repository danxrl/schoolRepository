<?php

// Función que busca regresa el nodo inicial del arreglo
function get_nodo($data, $search) {
    foreach ($data as $nodo) {
        if ($nodo['name'] == $search) {
            return $nodo;
        }
    }
}

function costo_uniforme($start, $final, $data){
    // Inicializa variables de arbol, abiertos y cerrados.
    $abiertos = array();
    $arbol = array();
    $cerrados = array();
    $temp = array();
    // Obtengo los valores del nodo raiz
    $start = get_nodo($data, $start);

    // Inserto el nodo raiz a cerrados
    array_push($cerrados, array(
        'name' => $start['name']
    ));
    
    // Inserto el nodo raiz al arbol
    array_push($arbol, array(
        'name' => $start['name'],
        'root' => $start['name']
    ));

    /* Aquí comienza el ciclo */
    do {
        // Obtengo los hijos del nodo
        $branches = $start['conn'];
    
        // Inserto los hijos del nodo en el arbol y en abiertos
        foreach ($branches as $branch) {
            $isBranch = false;
            if (!isset($branch['root'])){
                $branch['parent'] = $start['name'];
            }
            // Buscamos que no este en el array de abiertos
            for ($i = 0; $i < sizeof($abiertos); $i++) {
                if ($abiertos[$i]['name'] == $branch['name']) {
                    $isBranch = true;
                }
            }
            // Buscamos que no este en el array de cerrados
            for ($i = 0; $i < sizeof($cerrados); $i++) {
                if ($cerrados[$i]['name'] == $branch['name']) {
                    $isBranch = true;
                }
            }
            // Si no está en abiertos o cerrados lo agrega un array temporal para ordenarlos por costo
            if (!$isBranch) {
                array_push($temp, $branch);
            }
        }

        // Ponemos los pesos para ordenarlos
        for ($i=0; $i < sizeof($temp); $i++) { 
            $aux[$i] = $temp[$i]['dist'];
        }
        // Ordena segun los pesos
        arsort($aux);
        foreach($aux as $value) {
            foreach ($temp as $node) {
                if ($value == $node['dist']){
                    // Agrega al final del array de abiertos
                    array_push($abiertos, $node);
                    // Agrega al final del arbol
                    array_push($arbol, $node);
                }
            }
        }
        

        $aux = array();
        $temp = array();
        // Obtengo el primer nodo del los nodos abiertos
        $start = array_pop($abiertos);
        // Obtengo los valores del nodo
        $start = get_nodo($data, $start['name']);
        // Cierro el nodo
        array_push($cerrados, array(
            'name' => $start['name']
        ));

    } while ($start['name'] != $final);

    return $arbol;
}

function print_route($arbol, $start, $final){
    $route = array();
    do {
        for ($i=0; $i < sizeof($arbol); $i++) { 
            if ($arbol[$i]['name'] == $final) {
                array_unshift($route, $final);
                $final = $arbol[$i]['parent'];
            }
        }
    } while ($final != $start);
    array_unshift($route, $start);
    for ($i=0; $i < sizeof($route); $i++) {
        echo $route[$i] . '<br>';
    }
}