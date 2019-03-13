<?php

if($_POST['r'] == 'atomo-add' && !isset($_POST['crud'])): ?>
    <div class="container">
    <main role="main">
        <section class="content-form" id="atomo_form">
            <h2 class="sub-title">Agregar átomo</h2>
            <form method="post">
                <div class="form-group width-12">
                    <div class="width-6">
                        <input type="text" placeholder="Átomo" class="form-control" name="atomo" required="" />
                    </div> 
                </div>
                <div class="form-group width-12">
                    <input type="submit" value="Aceptar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="atomo-add">
                    <input type="hidden" name="crud" value="set">
                </form>
                <form>
                    <input type="submit" value="Cancelar" class="form-control btn btn-principal"/>
                    <input type="hidden" name="r" value="atomo-add">
                    <input type="hidden" name="crud" value="unset">
                </div>
            </form>
        </section>
    </main>
    </div>
</body>
<?php 

elseif($_POST['r'] == 'atomo-add' && $_POST['crud'] == 'set') :

    $atomo_controller = new AtomoController();

    $new_atomo = array(
        'atomo' => $_POST['atomo']
    );

    $atomo = $atomo_controller->create($new_atomo);

    $template = "
        <script>
            window.onload = function () {
                alert('Átomo agregado correctamente.');
                window.location.href = 'atomos';
            }
        </script>
    ";
    
    print($template);

elseif($_POST['r'] == 'atomo-add' && $_POST['crud'] == 'unset') :
    $template = "
        <script>
            window.onload = function () {
                window.location.href = 'atomos';
            }
        </script>
    ";
endif;