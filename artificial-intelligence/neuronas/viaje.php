<?php

require('viaje-perceptron.php');

if((isset($_POST['parking'])) && (isset($_POST['wife'])) && (isset($_POST['money']))) {
    $parking = $_POST['parking'];
    $money = $_POST['money'];
    $wife = $_POST['wife'];

    // if ($parking == 'true') {
    //     echo  '<p>Si va a ir</p>';
    // } elseif(($money == 'true') && ($wife == 'true')) {
    //     echo  '<p>Si va a ir</p>';
    // } else {
    //     echo  '<p>No va a ir</p>';
    // }

    $data = array(
        'i1' => $wife,
        'i2' => $money,
        'out' => array(
            '0' => 0,
            '1' => 0,
            '2' => 0,
            '3' => 1
        )
    );

    $new_i = neurona($data);

    echo "<p>$new_i</p>";

    $new_data = array(
        'i1' => $parking,
        'i2' => $new_i,
        'out' => array(
            '0' => 0,
            '1' => 1,
            '2' => 1,
            '3' => 1
        )
    );

    $response = neurona($new_data);

    if($response == 1){
        echo  '<p>Si va a ir</p>';
    } else {
        echo  '<p>No va a ir</p>';
    }

} else {
    echo "<p>Error</p>";
}