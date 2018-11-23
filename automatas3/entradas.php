<?php
var_dump($_POST);

$data = '';
$var = '';
$estados = array();
$data_estados = '';

for ($i=1; $i <= $_POST['num_estados'] ; $i++) { 
    $estados[$i-1] = $_POST['estado'.$i.''];
    $data_estados .= 'estado'.$i.': "'.$estados[$i-1].'",';
}

?>


<h5 class="text-center">Ingresa los valores de entrada</h5><br/>
<form method="post">
    <?php for($i=1; $i <= $_POST['num_entradas']; $i++): ?>
        <label for='entrada<?php echo $i?>'>Entrada <?php echo $i?></label>
        <input type='text' name='entrada<?php echo $i?>' id='entrada<?php echo $i?>' required><br/>
    <?php   
            $data .= "entrada$i: entrada$i,";
            $var .= "var entrada$i = document.getElementById(\"entrada$i\").value; \n";
    endfor;
    ?>
    <input type="button" value="Enviar" onclick="enviar_entradas();">
</form>

<script>
    function enviar_entradas() {
        
        <?php echo "$var"; ?>;
        
        $.ajax({
            url: 'tabla.php',
            type: 'POST',
            dataType: 'html',
            data: {
                <?php echo $data_estados ?>
                <?php echo $data ?>
                num_estados: <?php echo $_POST['num_estados']; ?>,
                num_entradas: <?php echo $_POST['num_entradas']; ?>
            }
        })
        .done(function(respuesta) {
            $("#num_ent").hide();
            $("#entradas").html(respuesta);
            
        })
        .fail(function () {
            console.log('error');
        })
    }
</script>
