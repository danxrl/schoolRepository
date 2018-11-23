<?php 

$cliente_controller = new ClienteController();
$cliente_data = $cliente_controller->read();
$almacen_controller = new AlmacenController();
$almacen_data = $almacen_controller->read();
$transporte_controller = new TransporteController();
$transporte_data = $transporte_controller->read();

if($_POST['r'] == 'pedido-add' && !isset($_POST['crud'])): ?>
    <br/>
    <main role="main">
        <section class="content-form" id="pedido_form">
            <h2 class="sub-title">Agregar pedido</h2>
            <form method="post">
                <div class="form-group width-12">
                    <label for="cliente" class="form-control width-4">Cliente</label>
                    <select name="cliente_id" class="form-control width-8">
                        <?php foreach($cliente_data as $cliente): ?>
                            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group width-12">
                    <div class="form-group width-6">
                        <label for="transporte_id" class="form-control width-3">Transporte</label>
                        <select name="transporte_id" class="form-control width-9">
                            <?php foreach($transporte_data as $transporte): ?>
                                <option value="<?php echo $transporte['id']; ?>"><?php echo $transporte['descripcion'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group width-6">
                        <label for="almacen_id" class="form-control width-3">Almacen</label>
                        <select name="almacen_id" class="form-control width-9">
                            <?php foreach($almacen_data as $almacen): ?>
                                <option value="<?php echo $almacen['id']; ?>"><?php echo $almacen['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="width-9">
                        <input type="text" placeholder="Dirección *" class="form-control" name="direccion" required />
                    </div>
                </div>
                <div class="form-group width-12">
                    <h3 class="sub-form">Observaciones</h3>
                    <textarea cols="22" rows="1" class="form-control" name="observaciones">
                    </textarea>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="pedido-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="pedido-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'pedido-add' && $_POST['crud'] == 'set') :

    $pedido_controller = new PedidoController();

    $new_pedido = array(
        'cliente_id' => $_POST['cliente_id'],
        'transporte_id' => $_POST['transporte_id'],
        'almacen_id' => $_POST['almacen_id'],
        'direccion' => $_POST['direccion'],
        'status' => 'Pedido',
        'observaciones' => $_POST['observaciones']
    );

    $pedido = $pedido_controller->create($new_pedido);

    $template = "
        <script>
            window.onload = function () {
                alert('Pedido agregado correctamente.');
                window.location.href = 'pedido';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'pedido-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'pedido';
            }
        </script>
    ";
endif;