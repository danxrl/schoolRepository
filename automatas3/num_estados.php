<?php

$GLOBALS['num_estados'] = 0;
$num_estados = 0;
$data = '';
$var = '';
$console = '';

    $GLOBALS['num_estados'] = $_POST['num_estados'];

?>

<h5 class="text-center">Ingresa los nombres de los estados comenzando por el estado inicial</h5><br/>
<form method="post">
    <?php for($i=1; $i <= $GLOBALS['num_estados']; $i++): ?>
        <label for='estado<?php echo $i?>'>Estado <?php echo $i?></label>
        <input type='text' name='estado<?php echo $i?>' id='estado<?php echo $i?>' required><br/>
    <?php   
            $data .= "estado$i: estado$i,";
            $var .= "var estado$i = document.getElementById(\"estado$i\").value; \n";
    endfor;
    ?>
    <input type="button" value="Enviar" onclick="enviar_estados();">
</form>

<script>
    function enviar_estados() {
        
        <?php echo "$var"; ?>
        
        $.ajax({
            url: 'estados.php',
            type: 'POST',
            dataType: 'html',
            data: {
                <?php echo $data ?>
                num_estados: <?php echo $num_estados; ?>
            }
        })
        .done(function(respuesta) {
            $("#datos").hide();
            $("#estados").html(respuesta);
            
        })
        .fail(function () {
            console.log('error');
        })
    }
</script>