<?php

$partida_controller = new PartidaController();

if($_POST['r'] == 'partida' && !isset($_POST['crud'])): 

$partida_data = $partida_controller->read($_POST['pedido_id']);

?>

<section class="content-form" id="almacen_form">
    <h2 class="sub-title">Partidas</h2>
    <div class="form-group width-12">
        <form method="post">
            <input type="hidden" name="r" value="partida-add">
            <input type="submit" value="Agregar" class="form-control btn btn-principal"/>
        </form>
            <input type="search" placeholder="BUSCAR . . ." class="form-control btn expand btn-principal" id="searchTerm" onkeyup="doSearch()"/>
    </div>
    </section>
<div id="dor" class="text-center">
    <table class="text-center" id="datos" border="20">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Piezas</th>
                <th>Peso</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($partida_data as $data): ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['material_id']; ?></td>
                <td><?php echo $data['piezas']; ?></td>
                <td><?php echo $data['peso']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="partida-edit">
                        <input type="hidden" name="partida_id" value="<?php echo $data['id'] ?>">
                        <input type="hidden" name="pedido_id" value="<?php echo $_POST['pedido_id'] ?>">
                        <input type="submit" value="Actualizar" class="form-control btn btn-principal"/>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="partida-delete">
                        <input type="hidden" name="partida_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Eliminar" class="form-control btn btn-principal"/>
                    </form>
                </td>
            </tr>        
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>

<script language="javascript">
function doSearch() {
    var tableReg = document.getElementById('datos');
    var searchText = document.getElementById('searchTerm').value.toLowerCase();
    var cellsOfRow="";
    var found=false;
    var compareWith="";

    for (var i = 1; i < tableReg.rows.length; i++)
    {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
            {
                found = true;
            }
        }
        if(found)
        {
            tableReg.rows[i].style.display = '';
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = 'none';
        }
    }
}
</script>


<?php

endif;
// echo '<h1>Partidas Disponibles</h1>';
// // Instancia del objeto partida
// $partida = new PartidaController();

// // Creacion de partidas. Se insertan en la base de datos
// echo '<h1>Insertar partidas</h1>';
// $new_partida = array(
//     'id' => 0,
//     'material_id' => '1',
//     'piezas' => 101
// );
// // $partida->create($new_partida);


// // Actualizacion de partida
// echo '<h1>Actualizando partidas</h1>';
// $update_material = array(
// 	'id' => 3,
//     'material_id' => '1',
//     'piezas' => 12
// );
// $partida->update($update_material);


// // Eliminacion de partida
// echo '<h1>Eliminar partidas</h1>';
// $partida->delete(2);

// // Ejecuta el método read del objeto. Si envia parametro
// // Trae el resultado con el id, sino trae todos los resultados
// $partida_data = $partida->read();
// var_dump($partida_data);

// echo '<ul>';

// foreach ($partida_data as $value) {
// 	echo '<li> Material: ' . $value['id'] . ' - ' . $value['volumen'] . '</li>';
// }

// echo '</ul>';
