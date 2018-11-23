<?php

$estados = array();
$data_estados = '';

var_dump($_POST);

for ($i=1; $i <= $_POST['num_estados'] ; $i++) { 
    $estados[$i-1] = $_POST['estado'.$i.''];
    $data_estados .= 'estado'.$i.': "'.$estados[$i-1].'",';
}

?>

<h5 class="text-center">Ingresa el número de entradas</h5><br/>
<form method="post">
    <label for="num_entradas">Número de entradas del autómata: </label>
    <input type="number" name="num_entradas" id="num_entradas"></input>
    <input type="button" value="Enviar" onclick="enviar_num_entradas();">
</form>

<script>
    function enviar_num_entradas() {        
        var num_entradas = document.getElementById("num_entradas").value;
        var num_estados = <?php echo $_POST['num_estados']; ?>;
        
        $.ajax({
            url: 'entradas.php',
            type: 'POST',
            dataType: 'html',
            data: {
                <?php echo $data_estados ?>
                num_estados: num_estados,
                num_entradas: num_entradas
            }
        })
        .done(function(respuesta) {
            $("#estados").hide();
            $("#num_ent").html(respuesta);
            
        })
        .fail(function () {
            console.log('error');
        })
    }
</script>