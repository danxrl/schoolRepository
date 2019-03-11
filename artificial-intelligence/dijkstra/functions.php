<?php

// Función que genera la lista de nodos del arbol
function node_list($data) {
    $newList = null;
    foreach ($data as $value) {
        $newList[$value['name']] = array(
            'vert'  => $value['name'],
            'temp'  => 99999,
            'final' => null
        );
    }
    return $newList;
}

// Funcion que asigna nuevos valores a la lista
function new_values($nodeList, $vertex, $values) {
    foreach ($nodeList as $node) {
        if ($vertex == $node['vert']) {
            $nodeList[$vertex]['temp'] = $values['temp'];
            $nodeList[$vertex]['final'] = $values['final'];
        }
    }
    return $nodeList;
}

// Función que busca regresa el nodo inicial del arreglo
function search_node($node, $data, $nodeList, $pop = true) {
    foreach ($data as $value) {
        if ($value['name'] == $node) {
            if ($pop) {
                foreach ($value['conn'] as $conn) {
                    foreach ($nodeList as $comp) {
                        if ($conn['name'] == $comp['vert']) {
                            if (isset($comp['final'])) {
                                unset($value['conn'][$conn['name']]);
                            }
                        }
                    }
                }
            }
            return $value;
        }
    }
}

// Modificar las etiquetas temporales de los nodos adyacentes
function edit_data($data, $nodeList, $start) {
    foreach ($data['conn'] as $conn) {
        foreach ($nodeList as $node) {
            if ($conn['name'] == $node['vert']) {
                if (!isset($node['final'])) {
                    $new_temp = $conn['dist'] + $nodeList[$start]['final'];
                    $actual = $node['temp'];
                    $nodeList[$node['vert']]['temp'] = ($conn['dist'] + $nodeList[$start]['final']);
                    if (isset($actual)) {
                        if ($new_temp > $actual) {
                            $nodeList[$node['vert']]['temp'] = $actual;
                        } else {
                            $nodeList[$node['vert']]['parent'] = $nodeList[$start]['vert'];
                        }
                    }
                }
            }
        }
    }
    return $nodeList;
}

// Función para buscar el nuevo inicio por nodo temporal
function new_start($nodeList) {
    $value = 999999;
    foreach ($nodeList as $node) {
        if (!isset($node['final'])) {
            if (isset($node['temp'])) {
                if ($node['temp'] < $value) {
                    $value = $node['temp'];
                    $selected = $node['vert'];
                }
            }
        }
    }
    $nodeList[$selected]['final'] = $value;
    return array(
        0 => $nodeList,
        1 => $selected
    );
}

// Función para buscar la ruta mas corta
function dijkstra($nodeList, $data, $start, $final) {
    $firstNode = $start;
    while ($start != $final) {
        // Buscar los nodos adyacentes del nodo actual
        $dataSearched = search_node($start, $data, $nodeList);
        // Modificar las etiquetas temporales
        $nodeList = edit_data($dataSearched, $nodeList, $start);
        // Buscar nodo con etiqueta temporal menor
        $newStart = new_start($nodeList);
        // Asignar etiqueta temporal a etiqueta final
        $nodeList = $newStart[0];
        // Nuevo nodo inicial
        $start = $newStart[1];
    }
    $nodeList = no_set($nodeList);
    $nodeList['road'] = road($nodeList, $final, $firstNode);
    return $nodeList;
}

// Función para llenar los valores de null por inalcanzables con valor
function no_set($nodeList) {
    foreach ($nodeList as $node) {
        if ($node['final'] === null) {
            unset($nodeList[$node['vert']]);
        }
    }
    return $nodeList;
}

// Función para crear el camino
function road($nodeList, $final, $start) {
    $route = array();
    $i = 0;
    do {
        foreach ($nodeList as $node) {
            if ($node['vert'] == $final) {
                array_unshift($route, $node);
                $final = $node['parent'];
            }
        }
        $i++;
    } while (($final != $start) || ($i == 7));
    array_unshift($route, $nodeList[$start]);
    return $route;
}

// Función para imprimir la routa
function print_route($routeList) {
    $route = $routeList['road'];
    $i = 0;
    echo 'La routa menos costosa es: ';
    foreach ($route as $node) {
        $i++;
        echo $node['vert'];
        if ($i < sizeof($route)) {
            echo ' - ';
        } else {
            echo '<br>';
        }
    }
    echo 'El costo total es de: ' . $route[sizeof($route)-1]['final'];
}