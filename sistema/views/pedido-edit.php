<?php
$pedido_controller = new PedidoController();
$cliente_controller = new ClienteController();
$cliente_data = $cliente_controller->read();
$almacen_controller = new AlmacenController();
$almacen_data = $almacen_controller->read();
$transporte_controller = new TransporteController();
$transporte_data = $transporte_controller->read();
if($_POST['r'] == 'pedido-edit' && !isset($_POST['crud'])): 

    $pedido_data = $pedido_controller->read($_POST['pedido_id']);
    $estados = array('Pedido', 'Enviado', 'Entregado', 'Cancelado', 'Devuelto');

?>
    <br/>
    <main role="main">
        <section class="content-form" id="pedido_form">
            <h2 class="sub-title">Agregar pedido</h2>
            <form method="post">
                <div class="form-group width-12">
                    <label for="cliente" class="form-control width-4">Cliente</label>
                    <select name="cliente_id" class="form-control width-8">
                        <?php foreach($cliente_data as $cliente): ?>
                            <option value="<?php echo $cliente['id'];?>" <?php if($cliente['id'] == $pedido_data[0]['cliente_id']) echo "selected";?>><?php echo $cliente['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group width-12">
                    <div class="form-group width-6">
                        <label for="transporte_id" class="form-control width-3">Transporte</label>
                        <select name="transporte_id" class="form-control width-9">
                            <?php foreach($transporte_data as $transporte): ?>
                                <option value="<?php echo $transporte['id']; ?>"<?php if($transporte['id'] == $pedido_data[0]['transporte_id']) echo "selected";?>><?php echo $transporte['descripcion'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group width-6">
                        <label for="almacen_id" class="form-control width-3">Almacen</label>
                        <select name="almacen_id" class="form-control width-9">
                            <?php foreach($almacen_data as $almacen): ?>
                                <option value="<?php echo $almacen['id']; ?>"<?php if($almacen['id'] == $pedido_data[0]['almacen_id']) echo "selected";?>><?php echo $almacen['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="width-6">
                        <input type="hidden" name="status" value="<?php echo $pedido_data[0]['status'] ?>">
                        <input type="hidden" name="id" value="<?php echo $pedido_data[0]['id'] ?>">
                        <input type="text" value="<?php echo $pedido_data[0]['direccion'] ?>" class="form-control" name="direccion" required />
                    </div>
                    <div class="form-group width-6">
                        <label for="status" class="form-control width-3">Status</label>
                        <select name="status" class="form-control width-9">
                            <?php foreach($estados as $estado): ?>
                                <option value="<?php echo $estado; ?>"<?php if($estado == $pedido_data[0]['status']) echo "selected";?>><?php echo $estado ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group width-12">
                    <h3 class="sub-form">Observaciones</h3>
                    <textarea cols="22" rows="1" class="form-control" name="observaciones">
                    </textarea>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="pedido-edit">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="pedido-edit">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'pedido-edit' && $_POST['crud'] == 'set') :

    $update_pedido= array(
        'id' => $_POST['id'],
        'cliente_id' => $_POST['cliente_id'],
        'transporte_id' => $_POST['transporte_id'],
        'almacen_id' => $_POST['almacen_id'],
        'direccion' => $_POST['direccion'],
        'status' => $_POST['status'],
        'observaciones' => $_POST['observaciones']
    );

    $pedido = $pedido_controller->update($update_pedido);

    $template = "
        <script>
            window.onload = function () {
                alert('Pedido actualizado correctamente.');
                window.location.href = 'pedido';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'pedido-edit' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'pedido';
            }
        </script>
    ";
endif;