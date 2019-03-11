<?php
/**
 * Comparamos las rutas que hacen match con el aereopuerto y se imprimen
 * @param type $airports
 */
function tabla($airports){
    for ($a=0; $a < sizeof($airports); $a++) {
        $origin = $airports[$a];
        echo '<tr>
                <td scope="col" class="text-white indigo accent-2">' . $origin['code'] . ' </td>';
        $value = $origin['conn'];
        $i = 0;
        foreach ($value as $route) {
            for ($r=0; $r < sizeof($airports); $r++) { 
                $airport_code = $airports[$r]['code'];
                if ($route['name'] == $airport_code) {
                    // Crear funcion para encontrar la distancia entre aereopuertos
                    echo '<td scope="col" class="text-center"> ==' . $route['name'] . '<br>
                            ' .$route['dist'] . '_km </td>';
                    $i++;
                } 
            }
        }
        echo '<th>->' . $i . '</th>';
        $i = 0;
        echo '</tr>';
    }
}
