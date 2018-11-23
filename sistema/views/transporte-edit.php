<?php 

$transporte_controller = new TransporteController();
$cajas = array('0','1');

if($_POST['r'] == 'transporte-edit' && !isset($_POST['crud'])): 

    $transporte = $transporte_controller->read($_POST['transporte_id']);

?>
    <main role="main">
        <section class="content-form" id="transporte_form">
            <h2 class="sub-title">Actualizar transporte</h2>
            <form method="post">
                <div class="form-group width-12">
                    <input type="hidden" name="id" value="<?php echo $transporte[0]['id']; ?>">
                    <input type="text" value="<?php echo $transporte[0]['id']; ?>" class="form-control" name="id" required /> 
                </div>
                <div class="form-group width-12">
                    <input type="text" value="<?php echo $transporte[0]['descripcion']; ?>" class="form-control" name="descripcion" required /> 
                </div>
                <div class="form-group width-12">
                    <div class="width-4">
                        <input type="text" value="<?php echo $transporte[0]['marca']; ?>" class="form-control" name="marca" required /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" value="<?php echo $transporte[0]['ejes']; ?>" class="form-control" name="ejes" required /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" value="<?php echo $transporte[0]['capacidad']; ?>" class="form-control" name="capacidad" required /> 
                    </div>  
                </div>                
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" value="<?php echo $transporte[0]['ancho']; ?>" class="form-control" name="ancho" required /> 
                    </div> 
                    <div class="width-6">
                        <input type="text" value="<?php echo $transporte[0]['largo']; ?>" class="form-control"  name="largo" required />
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" value="<?php echo $transporte[0]['alto']; ?>" class="form-control" name="alto" required /> 
                    </div> 
                    <div class="form-group width-6">
                        <label for="caja" class="form-control width-6" disabled>Caja</label>
                        <select class="form-control width-6" name="caja" required>
                            <?php foreach($cajas as $caja): ?>
                            <?php if($caja == $transporte[0]['caja']): ?>
                                    <option value="<?php echo $caja ?>" selected><?php if($caja == 0) {echo 'Cerrada';} else {echo 'Abierta';} ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $caja ?>" ><?php if($caja == 0) {echo 'Cerrada';} else {echo 'Abierta';} ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>  
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="transporte-edit">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="transporte-edit">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'transporte-edit' && $_POST['crud'] == 'set') :

    $update_transporte = array(
        'id' => $_POST['id'],
        'descripcion' => $_POST['descripcion'],
        'marca' => $_POST['marca'],
        'ejes' => $_POST['ejes'],
        'capacidad' => $_POST['capacidad'],
        'ancho' => $_POST['ancho'],
        'largo' => $_POST['largo'],
        'alto' => $_POST['alto'],
        'caja' => $_POST['caja']
    );

    $transporte = $transporte_controller->update($update_transporte);

    $template = "
        <script>
            window.onload = function () {
                alert('Transporte actualizado correctamente.');
                window.location.href = 'transporte';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'transporte-edit' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'transporte';
            }
        </script>
    ";
endif;