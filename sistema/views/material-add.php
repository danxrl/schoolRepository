<?php if($_POST['r'] == 'material-add' && !isset($_POST['crud'])): ?>
    <main role="main">
        <section class="content-form" id="material_form">
            <h2 class="sub-title">Agregar material</h2>
            <form method="post">
                <div class="form-group width-12">
                    <input type="text" placeholder="ID *" class="form-control" name="id" required /> 
                </div>
                <div class="form-group width-12">
                    <input type="text" placeholder="Descripcion *" class="form-control" name="descripcion" required /> 
                </div>    
                <div class="form-group width-12">
                    <div class="width-4">
                        <input type="text" placeholder="Largo del material (CM) *" class="form-control"  name="largo" required />
                    </div>  
                    <div class="width-4">
                        <input type="text" placeholder="Ancho del material (CM)*" class="form-control" name="ancho" required /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" placeholder="Peralte (CM)* " class="form-control"  name="peralte" required="" />
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="form-group width-6">
                        <label for="calibre" class="form-control width-4">Calibre</label>
                        <select class="form-control width-8" name="calibre" required>
                            <option value="20">20</option>
                            <option value="22">22</option>
                            <option value="24">24</option>
                            <option value="26">26</option>
                            <option value="28">28</option>
                        </select>
                    </div> 
                    <div class="width-6">
                        <input type="text" placeholder="Peso del material (KG)*" class="form-control" name="peso" required /> 
                    </div>
                </div> 
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="material-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="material-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'material-add' && $_POST['crud'] == 'set') :

    $material_controller = new MaterialController();

    $new_material = array(
        'id' => $_POST['id'],
        'descripcion' => $_POST['descripcion'],
        'largo' => $_POST['largo'],
        'ancho' => $_POST['ancho'],
        'peralte' => $_POST['peralte'],
        'calibre' => $_POST['calibre'],
        'peso' => $_POST['peso'],
    );

    $material = $material_controller->create($new_material);

    $template = "
        <script>
            window.onload = function () {
                alert('Material agregado correctamente.');
                window.location.href = 'material';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'material-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'material';
            }
        </script>
    ";
endif;