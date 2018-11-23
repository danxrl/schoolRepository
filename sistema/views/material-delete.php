<?php 

$material_controller = new MaterialController();
$calibres = array('20','22','24','26','28');

if($_POST['r'] == 'material-delete' && !isset($_POST['crud'])): 

    $material = $material_controller->read($_POST['material_id']);

?>
    <main role="main">
        <section class="content-form" id="material_form">
            <h2 class="sub-title">Realmene deseas eliminar este material?</h2>
            <form method="post">
                <div class="form-group width-12">
                    <input type="hidden" name="id" value="<?php echo $material[0]['id']; ?>">
                    <input type="text" value="<?php echo $material[0]['id']; ?>" class="form-control text-center" name="id" disabled /> 
                </div>
                <div class="form-group width-12">
                    <input type="text" value="<?php echo $material[0]['descripcion']; ?>" class="form-control" name="descripcion" disabled /> 
                </div>    
                <div class="form-group width-12">
                    <div class="width-4">
                        <input type="text" value="<?php echo $material[0]['largo']; ?>" class="form-control"  name="largo" disabled />
                    </div>  
                    <div class="width-4">
                        <input type="text" value="<?php echo $material[0]['ancho']; ?>" class="form-control" name="ancho" disabled /> 
                    </div> 
                    <div class="width-4">
                        <input type="text" value="<?php echo $material[0]['peralte']; ?>" class="form-control"  name="peralte" disabled="" />
                    </div>  
                </div>
                <div class="form-group width-12">
                    <div class="form-group width-6">
                        <label for="calibre" class="form-control width-4" disabled>Calibre</label>
                        <select class="form-control width-8" name="calibre" disabled>
                            <?php foreach($calibres as $calibre): ?>
                                <?php if($calibre == $material[0]['calibre']): ?>
                                    <option value="<?php echo $calibre ?>" selected><?php echo $calibre ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $calibre ?>" ><?php echo $calibre ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div> 
                    <div class="width-6">
                        <input type="text" value="<?php echo $material[0]['peso']; ?>" class="form-control" name="peso" disabled /> 
                    </div>
                </div> 
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="material-delete">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="material-delete">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
</body>
<?php 

elseif($_POST['r'] == 'material-delete' && $_POST['crud'] == 'set') :

    $matereial_delete = $_POST['id'];

    $material = $material_controller->delete($matereial_delete);

    $template = "
        <script>
            window.onload = function () {
                alert('Material eliminado correctamente.');
                window.location.href = 'material';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'material-edit' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'material';
            }
        </script>
    ";
endif;