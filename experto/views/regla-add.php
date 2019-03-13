<?php

$atomo_controller = new AtomoController();
$atomos = $atomo_controller->read();
$id = 0;
$negado = 0;

if($_POST['r'] == 'regla-add' && !isset($_POST['crud'])): ?>
    <div class="container">
    <div class="row">
    <main role="main">
        <section class="content-form" id="regla_form">
            <h2 class="sub-title">Agregar regla</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" placeholder="Regla" class="form-control" name="regla" required="" />
                    </div><br>
                    <?php foreach($atomos as $atomo): ?>
                    <?php $id++; $negado++; ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-dark">
                                <input type="checkbox" name="id<?php echo $id ?>" value="<?php echo $atomo['atomo'] ?>">
                            </div>
                            <div class="input-group-text bg-secondary">
                                <input type="checkbox" name="signo<?php echo $negado ?>" value="<?php echo $atomo['atomo'] ?>">
                            </div>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $atomo['atomo'] ?>" disabled>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal bg-success text-white"/>
                    <input type="hidden" name="r" value="regla-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal bg-danger text-white"/>
                    <input type="hidden" name="r" value="regla-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </div>
    </div>
</body>
<script>
    
</script>
<?php

elseif($_POST['r'] == 'regla-add' && $_POST['crud'] == 'set') :

    $reglas_controller = new ReglaController();

    $new_regla= array(
        'idr' => $_POST['regla'],
        'atomos' => $_POST['atomos'],
        'consecuente' => $_POST['consecuente'],
        'signo' => $_POST['signo']
    );

    $regla = $reglas_controller->create($new_regla);

    $template = "
        <script>
            window.onload = function () {
                alert('Partida agregada correctamente.');
                window.location.href = 'reglas';
            }
        </script>
    ";

    print($template);

elseif($_POST['r'] == 'regla-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'reglas';
            }
        </script>
    ";
endif;