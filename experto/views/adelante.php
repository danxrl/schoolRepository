<?php

$atomo_controller = new AtomoController();
$atomos = $atomo_controller->read();
$id = 0;

?>
<div class="container">
    <div class="row">
    <main role="main">
        <section class="content-form" id="regla_form">
            <h2 class="sub-title">Seleccionar hechos</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="row col-md-12">
                    <input type="text" value="Selecciona los antecedentes" class="btn btn-principal bg-primary text-white col-md-12" disabled/>
                        <?php foreach($atomos as $atomo): ?>
                        <div class="input-group col-md-4 mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-dark text-white">
                                    <input type="checkbox" name="atomo<?php echo '-'.$id ?>" value="<?php echo $atomo['atomo'] ?>"> Agregar
                                </div>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $atomo['atomo'] ?>" disabled>
                        </div>
                        <?php $id++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal bg-success text-white"/>
                    <input type="hidden" name="r" value="adelante-core">
                    <input type="hidden" name="crud" value="set">
                </form>
                <br>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal bg-danger text-white"/>
                    <input type="hidden" name="r" value="reglas">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </div>
</div>
</body>
