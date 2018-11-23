<?php

var_dump($_POST);

$data = '';
$var = '';
$estados = array();
$data_estados = '';
$entrada = array();
$data_entrada = '';

for ($i=1; $i <= $_POST['num_estados'] ; $i++) { 
    $estados[$i-1] = $_POST['estado'.$i.''];
    $data_estados .= 'estado'.$i.': "'.$estados[$i-1].'",';
}

for ($i=1; $i <= $_POST['num_entradas'] ; $i++) { 
    $entrada[$i-1] = $_POST['entrada'.$i.''];
    $data_entrada .= 'entrada'.$i.': "'.$entrada[$i-1].'",';
}

for ($i=0; $i < $_POST['num_estados']; $i++) { 
    for ($j=0; $j < $_POST['num_entradas'] ; $j++) {
        $asd = "$estados[$i]$entrada[$j]";
        $var .= "var $asd = document.getElementById('$asd').value; \n";
        $data .= "'$asd': $asd,";
    }
}

?>

<h5 class="text-center">Ingresa los estados a los que te lleva cada entrada</h5><br/>
<form method="post">

    <table>
        <thead>
                <th></th>
            <?php foreach($entrada as $key): ?>
                <th><?php echo $key ?></th>
            <?php endforeach; ?>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($estados as $value): ?>
                <tr>
                    <td><?php echo $value ?></td>
                    <?php foreach($entrada as $dato): ?>
                        <td><input type="text" id="<?php echo $value . $dato ?>"></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <input type="button" value="Enviar" onclick="enviar_flujo();">
</form>

<script>
    function enviar_flujo() {
        
        <?php echo "$var"; ?>
        
        $.ajax({
            url: 'automata.php',
            type: 'POST',
            dataType: 'html',
            data: {
                <?php echo $data ?>
                <?php echo $data_estados ?>
                <?php echo $data_entrada ?>
                num_estados: <?php echo $_POST['num_estados']; ?>,
                num_entradas: <?php echo $_POST['num_entradas']; ?>
            }
        })
        .done(function(respuesta) {
            $("#entradas").hide();
            $("#tabla").html(respuesta);
            
        })
        .fail(function () {
            console.log('error');
        })
    }
</script>
