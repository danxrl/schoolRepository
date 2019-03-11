<?php

require_once('../sources/distancia.php');

// Obtener en un array los valores del archivo common.json
$common = file_get_contents('../sources/common.json');
$json = json_decode($common, true);

// Pasar a la variable $data solo la seccion de airports
$data = $json['airports'];

/**
 * A partir de la data recibida en el json, crea un array con los datos que necesitamos
 * y elimina todo el contenido basura del archivo json.
 * @param type $data
 * @return type, Datos de los aereopuertos y la lista de conexiones de cada uno de ellos.
 */
function set_airports($data) {
    for ($i=0; $i < sizeof($data); $i++) { 
        
        $count = 0;
        for ($k=0; $k < sizeof($data[$i]['routes']); $k++) { 
            $route = $data[$i]['routes'][$k];
            $aux = explode(":",$route);
            if ($aux[0] == "airport") {
                $temp = explode("|",$aux[1]);
                if (!isset($temp[1])) {
                    $routes[$count]['name'] = $temp[0];
                    $routes[$count]['dist'] = 0;
                    $count++;
                }
            }
        }
    
        $airports[$i] = array(
            "name" => $data[$i]['iataCode'],
            "altername" => $data[$i]['name'],
            "code" => $data[$i]['iataCode'],
            "latitude" => $data[$i]['coordinates']['latitude'],
            "longitude" => $data[$i]['coordinates']['longitude'],
            "conn" => $routes
        );
    }
    return $airports;
}

/**
 * Obtiene unicamente la información de los nodos sin sus conexiones.
 * Solo su nombre y hubicación.
 * @param type $airports
 * @return type, Datos de los aereopuertos (Codigo, latitud y longitud)
 */
function get_nodes($airports){
    for ($i=0; $i < sizeof($airports); $i++) { 
        $nodes[$i] = $airports[$i];
        unset($nodes[$i]['conn']);
        unset($nodes[$i]['name']);
    }
    return $nodes;
}

/**
 * Agrega el valor de la distancia en kilometros desde el origen al nodo destino
 * Busca dentro del nodo origen las conexiones y busca los valores de posicion que
 * tienen cada uno de sus destinos. Realiza el calculo con la función harvestine y
 * asigna el valor en el campo correspondiente
 * @param type $airports
 * @param type $nodes
 * @return type, Lista de aereopuertos con sus conexiones y la distancia hasta cada una de ellas.
 */
function set_dist($nodes, $airports) {
    // Entra al nodo en la posicion a
    for ($a=0; $a < sizeof($nodes); $a++) { 
        // Entra en las conexiones del nodo a con posicion b
        for ($b=0; $b < sizeof($airports[$a]['conn']); $b++) { 
            $port = $airports[$a]['conn'][$b]['name'];
            for ($c=0; $c < sizeof($nodes); $c++) { 
                $nodo = $nodes[$c]['code'];
                // Calcula la distancia del origen al destino
                if ($nodo == $port) {
                    $lat1 = $nodes[$a]['latitude'];
                    $long1 = $nodes[$a]['longitude'];
                    $lat2 = $airports[$c]['latitude'];
                    $long2 = $airports[$c]['longitude'];
                    $dist = harvestine($lat1, $long1, $lat2, $long2);
                    $airports[$a]['conn'][$b]['dist'] = $dist;
                }
            }
        }
    }
    return $airports;
}



$airports = set_airports($data);

$nodes = get_nodes($airports);

$data = set_dist($nodes, $airports);