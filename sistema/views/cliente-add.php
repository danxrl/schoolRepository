<?php if($_POST['r'] == 'cliente-add' && !isset($_POST['crud'])): ?>
    <main role="main">
        <section class="content-form" id="cliente_form">
            <h2 class="sub-title">Agregar cliente</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-12">
                        <input type="text" placeholder="Nombre *" class="form-control" name="nombre" required/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="width-12">
                        <input type="text" placeholder="Dirección *" class="form-control" name="direccion" required />
                    </div>
                </div>
                <div class="form-group width-12"> 
                    <div class="width-12">
                        <input type="email" placeholder="Email *  example@hotmail.com" class="form-control"  name="correo" required/>
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" placeholder="RFC *" class="form-control" name="rfc" required/> 
                    </div> 
                    <div class="width-6">
                        <input type="text" placeholder="Teléfono *" class="form-control" name="telefono" required/> 
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="cliente-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="cliente-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </body>
<?php 

elseif($_POST['r'] == 'cliente-add' && $_POST['crud'] == 'set') :

    $cliente_controller = new ClienteController();

    $new_cliente = array(
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'correo' => $_POST['correo'],
        'telefono' => $_POST['telefono'],
        'rfc' => $_POST['rfc']
    );

    $cliente = $cliente_controller->create($new_cliente);

    $template = "
        <script>
            window.onload = function () {
                alert('Cliente agregado correctamente.');
                window.location.href = 'cliente';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'cliente-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'cliente';
            }
        </script>
    ";
endif;