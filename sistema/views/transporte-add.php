<?php if($_POST['r'] == 'transporte-add' && !isset($_POST['crud'])): ?>
    <main role="main">
        <section class="content-form" id="transporte_form">
            <h2 class="sub-title">Agregar transporte</h2>
            <form method="post">
                <div class="form-group width-12">
                    <input type="text" placeholder="ID *" class="form-control" name="id" required /> 
                </div>
                <div class="form-group width-12">
                    <input type="text" placeholder="Descripcion *" class="form-control" name="descripcion" required /> 
                </div>
                <div class="form-group width-12">
                    <div class="width-4">
                        <input type="text" placeholder="Marca *" class="form-control" name="marca" required /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" placeholder="Ejes *" class="form-control" name="ejes" required /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" placeholder="Capacidad (KG)*" class="form-control" name="capacidad" required /> 
                    </div>  
                </div>                
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" placeholder="Ancho de la caja (CM)*" class="form-control" name="ancho" required /> 
                    </div> 
                    <div class="width-6">
                        <input type="text" placeholder="Largo de la caja (CM)*" class="form-control"  name="largo" required />
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" placeholder="Altura (CM)*" class="form-control" name="alto" required /> 
                    </div> 
                    <div class="form-group width-6">
                        <label for="caja" class="form-control width-6" disabled>Caja</label>
                        <select class="form-control width-6" name="caja" required>
                            <option value="1">Abierta</option>
                            <option value="0">Cerrada</option>
                        </select>
                    </div>  
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="transporte-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="transporte-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'transporte-add' && $_POST['crud'] == 'set') :

    $transporte_controller = new TransporteController();

    $new_transporte = array(
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

    $transporte = $transporte_controller->create($new_transporte);

    $template = "
        <script>
            window.onload = function () {
                alert('Transporte agregado correctamente.');
                window.location.href = 'transporte';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'transporte-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'transporte';
            }
        </script>
    ";
endif;