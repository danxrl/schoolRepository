<?php
$partida_controller = new PartidaController();
$material_controller = new MaterialController();
$materiales = $material_controller->read();

if($_POST['r'] == 'partida-edit' && !isset($_POST['crud'])): 

    $partida = $partida_controller->read($_POST['partida_id']);

?>
    <main role="main">
        <section class="content-form" id="partida_form">
            <h2 class="sub-title">Agregar partida</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-6">
                        <select name="material_id" class="form-control" required>
                            <?php foreach($materiales as $material): ?>
                                <option value="<?php echo $material['id'] ?>" <?php if($material['id'] == $partida[0]['material_id']) echo 'selected' ?>><?php echo $material['id'] . ' - ' . $material['descripcion'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>  
                    <div class="width-6">
                        <input type="hidden" name="id" value="<?php echo $partida[0]['id'] ?>">
                        <input type="number" value="<?php echo $partida[0]['piezas'] ?>" class="form-control" name="cantidad" required="" />
                    </div> 
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="partida-edit">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="partida-edit">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'partida-edit' && $_POST['crud'] == 'set') :


    $new_partida = array(
        'id' => $_POST['id'],
        'material_id' => $_POST['material_id'],
        'piezas' => $_POST['cantidad']
    );

    $partida = $partida_controller->update($new_partida);

    $template = "
        <script>
            window.onload = function () {
                alert('Partida actualizada correctamente.');
                window.location.href = 'pedido';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'partida-edit' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'pedido';
            }
        </script>
    ";
endif;