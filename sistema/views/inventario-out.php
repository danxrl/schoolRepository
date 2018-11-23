<?php 

$material_controller = new MaterialController();
$materiales = $material_controller->read();


if($_POST['r'] == 'inventario-out' && !isset($_POST['crud'])): ?>
    <main role="main">
        <section class="content-form" id="cliente_form">
            <h2 class="sub-title">Salida material del almacen '<?php echo $_POST['almacen_id'] ?>'</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-6">
                        <select name="material_id" class="form-control" required>
                            <?php foreach($materiales as $material): ?>
                                <option value="<?php echo $material['id'] ?>"><?php echo $material['id'] . ' - ' . $material['descripcion'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>  
                    <div class="width-6">
                        <input type="number" placeholder="Cantidad *" class="form-control" name="cantidad" required="" />
                        <input type="hidden" name="almacen_id" value="<?php echo $_POST['almacen_id'] ?>">
                    </div> 
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="inventario-out">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="inventario-out">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </body>
<?php 

elseif($_POST['r'] == 'inventario-out' && $_POST['crud'] == 'set') :

    $inventario_controller = new MovimientoController();

    $new_movimiento = array(
        'almacen_id' => $_POST['almacen_id'],
        'material_id' => $_POST['material_id'],
        'cantidad' => $_POST['cantidad'],
        'tipo_movimiento' => 'Salida'
    );

    $inventario = $inventario_controller->create($new_movimiento);

    $template = "
        <script>
            window.onload = function () {
                alert('Material removido correctamente.');
                window.location.href = 'inventario';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'inventario-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'inventario';
            }
        </script>
    ";
endif;