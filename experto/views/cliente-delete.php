<?php 

$cliente_controller = new ClienteController();

if($_POST['r'] == 'cliente-delete' && !isset($_POST['crud'])): 

    $cliente = $cliente_controller->read($_POST['cliente_id']);
?>
    <main role="main">
        <section class="content-form" id="cliente_form">
            <h2 class="sub-title">Realmente deseas eliminar este cliente?</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-12">
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente[0]['id'];?>">
                        <input type="text" value="<?php echo $cliente[0]['nombre'];?>" class="form-control" name="nombre" disabled/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="width-12">
                        <input type="text" value="<?php echo $cliente[0]['direccion'];?>" class="form-control" name="direccion" disabled />
                    </div>
                </div>
                <div class="form-group width-12"> 
                    <div class="width-12">
                        <input type="email" value="<?php echo $cliente[0]['correo'];?>" class="form-control"  name="correo" disabled/>
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" value="<?php echo $cliente[0]['rfc'];?>" class="form-control" name="rfc" disabled/> 
                    </div> 
                    <div class="width-6">
                        <input type="text" value="<?php echo $cliente[0]['telefono'];?>" class="form-control" name="telefono" disabled/> 
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="cliente-delete">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="cliente-delete">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </body>
<?php 

elseif ($_POST['r'] == 'cliente-delete' && $_POST['crud'] == 'set') :

    $cliente_id = $_POST['cliente_id'];

    $cliente = $cliente_controller->delete($cliente_id);

    $template = "
        <script>
            window.onload = function () {
                alert('Cliente eliminado correctamente.');
                window.location.href = 'cliente';
            }
        </script>
    ";
    
    print($template);
elseif($_POST['r'] == 'cliente-delete' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'cliente';
            }
        </script>
    ";
endif;