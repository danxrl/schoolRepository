<?php 

$almacen_controller = new AlmacenController();

if($_POST['r'] == 'almacen-delete' && !isset($_POST['crud'])): 

    $almacen = $almacen_controller->read($_POST['almacen_id']);
?>
    <main role="main">
        <section class="content-form" id="cliente_form">
            <h2 class="sub-title">Realmente deseas eliminar este almacen?</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-12">
                        <input type="hidden" name="almacen_id" value="<?php echo $almacen[0]['id'];?>">
                        <input type="text" value="<?php echo $almacen[0]['nombre'];?>" class="form-control" name="nombre" disabled/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="width-12">
                        <input type="text" value="<?php echo $almacen[0]['direccion'];?>" class="form-control" name="direccion" disabled />
                    </div>
                </div>
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="email" value="<?php echo $almacen[0]['correo'];?>" class="form-control"  name="correo" disabled/>
                    </div> 
                    <div class="width-6">
                        <input type="text" value="<?php echo $almacen[0]['telefono'];?>" class="form-control" name="telefono" disabled/> 
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="almacen-delete">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="almacen-delete">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </body>
<?php 

elseif ($_POST['r'] == 'almacen-delete' && $_POST['crud'] == 'set') :

    $almacen_id = $_POST['almacen_id'];

    $almacen = $almacen_controller->delete($almacen_id);

    $template = "
        <script>
            window.onload = function () {
                alert('Almacen eliminado correctamente.');
                window.location.href = 'almacen';
            }
        </script>
    ";
    
    print($template);
elseif($_POST['r'] == 'almacen-delete' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'almacen';
            }
        </script>
    ";
endif;