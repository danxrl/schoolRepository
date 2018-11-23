<?php if($_POST['r'] == 'almacen-add' && !isset($_POST['crud'])): ?>
    <main role="main">
        <section class="content-form" id="almace_form">
            <h2 class="sub-title">Agregar almacen</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-12">
                        <input type="text" placeholder="ID *" class="form-control" name="id" required/> 
                    </div>
                </div>
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
                    <div class="width-6">
                        <input type="text" placeholder="Teléfono *" class="form-control" name="telefono" required/> 
                    </div> 
                    <div class="width-6">
                        <input type="email" placeholder="Email *  example@hotmail.com" class="form-control"  name="correo" required/>
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="almacen-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="almacen-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </body>
<?php 

elseif($_POST['r'] == 'almacen-add' && $_POST['crud'] == 'set') :

    $almacen_controller = new AlmacenController();

    $new_cliente = array(
        'id' => $_POST['id'],
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'correo' => $_POST['correo'],
        'telefono' => $_POST['telefono']
    );

    $almacen = $almacen_controller->create($new_cliente);

    $template = "
        <script>
            window.onload = function () {
                alert('Almacen agregado correctamente.');
                window.location.href = 'almacen';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'almacen-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'almacen';
            }
        </script>
    ";
endif;