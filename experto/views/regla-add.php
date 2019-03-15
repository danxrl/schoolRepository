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
                    <div class="row col-md-12">
                    <input type="text" value="Selecciona los antecedentes" class="btn btn-principal bg-primary text-white col-md-12" disabled/>
                        <?php foreach($atomos as $atomo): ?>
                        <div class="input-group col-md-4 mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-dark text-white">
                                    <input type="checkbox" name="atomo<?php echo '-'.$id ?>" value="<?php echo $atomo['id'] ?>"> Agregar
                                </div>
                                <div class="input-group-text bg-secondary text-white">
                                    <input type="checkbox" name="atomo<?php echo '.'.$id ?>" > Negar
                                </div>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $atomo['atomo'] ?>" disabled>
                        </div>
                        <?php $id++; $negado++; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="row col-md-12">
                        <input type="text" value="Selecciona los consecuentes" class="btn btn-principal bg-primary text-white col-md-12" disabled/>
                        <?php foreach($atomos as $atomo): ?>
                        <div class="input-group col-md-4 mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-dark text-white">
                                    <input type="checkbox" name="cons<?php echo '-'.$id ?>" value="<?php echo $atomo['id'] ?>"> Agregar
                                </div>
                                <div class="input-group-text bg-secondary text-white">
                                    <input type="checkbox" name="cons<?php echo '.'.$id ?>" > Negar
                                </div>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $atomo['atomo'] ?>" disabled>
                        </div>
                        <?php $id++; $negado++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal bg-success text-white"/>
                    <input type="hidden" name="r" value="regla-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <br>
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
<?php

elseif($_POST['r'] == 'regla-add' && $_POST['crud'] == 'set') :

    $datos = array();
    $consec = array();
    foreach($_POST as $campo => $valor) {
        if (($campo != 'regla') && ($campo != 'r') && ($campo != 'crud')) {
            $tipo = substr($campo, 0,  4);
            if ($tipo == 'atom') {
                array_push($datos, [$campo, $valor]);
            } else {
                array_push($consec, [$campo, $valor]);
            }
        }
    }

    $data = _separar_datos($datos);
    $consecuentes = _separar_datos($consec);

    $existe = false;
    foreach ($data as $valor) {
        foreach ($consecuentes as $key) {
            if ($valor[0] == $key[0]) {
                $existe = true;
                break;
            }
        }
    }

    if (!$existe) {
        $reglas_controller = new ReglaController();
        $new_regla= array(
            'idr' => $_POST['regla'],
            'atomos' => $data,
            'consecuentes' => $consecuentes,
        );

        $regla = $reglas_controller->create($new_regla);

        $template = "
            <script>
                window.onload = function () {
                    alert('Regla agregada correctamente.');
                    window.location.href = 'reglas';
                }
            </script>
        ";
    } else {
        $template = "
            <script>
                window.onload = function () {
                    alert('No puedes repetir antecedentes en los consecuentes.');
                    window.location.href = 'reglas';
                }
            </script>
        ";
    }

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

function _separar_datos(Array $datos) {
    $data = array();
    for ($i=0; $i < sizeof($datos); $i++) {
        if ($datos[$i][1] != 'on') {
            $index = substr($datos[$i][0], -1);
            if (isset($datos[$i+1])) {
                $sub_index = substr($datos[$i+1][0], -1);
                if ($index == $sub_index) {
                    array_push($data, [$datos[$i][1], 0]);
                } else {
                    array_push($data, [$datos[$i][1], 1]);
                }
            } else {
                array_push($data, [$datos[$i][1], 1]);
            }
        }
    }
    return $data;
}