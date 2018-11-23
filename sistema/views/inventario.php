<?php

$almacen = new AlmacenController();
$almacen_data = $almacen->read();
?>

<section class="content-form" id="almacen_form">
    <h2 class="sub-title">Seccion de inventarios</h2>
    <div class="form-group width-12">
        <form method="post">
            <input type="hidden" name="r" value="almacen-add">
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
                <th colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($almacen_data as $data): ?>
            <tr>
                <td style="width: 100px;"><?php echo $data['id']; ?></td>
                <td style="width: 450px;"><?php echo $data['nombre']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="inventario-in">
                        <input type="hidden" name="almacen_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Entrada" class="form-control btn btn-principal"/>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="inventario-out">
                        <input type="hidden" name="almacen_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Salida" class="form-control btn btn-principal"/>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="inventario-all">
                        <input type="hidden" name="almacen_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Movimientos" class="form-control btn btn-principal"/>
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

// // Instancia del objeto movimiento
// $movimiento = new MovimientoController();

// // Creacion de movimiento. Se insertan en la base de datos
// echo '<h1>Insertar movimiento</h1>';
// $new_movimiento = array(
//     'id' => 0, // AUTO_INCREMENT
//     'material_id' => '0',
//     'almacen_id' => 'almacenMTY',
// 	'cantidad' => 35,
//     'tipo_movimiento' => 'Salida', // ENUM('Entrada','Salida')
//     'fecha_movimiento' => 0 // CURRENT_TIMESTAMP
// );
// // $movimiento->create($new_movimiento);


// // Actualizacion de movimiento
// echo '<h1>Actualizando movimientos</h1>';
// $update_movimientos = array(
//     'id' => 2, // Id a modificar
//     'material_id' => '0',
//     'almacen_id' => 'almacenMTY',
//     'cantidad' => 45,
//     'tipo_movimiento' => 'Salida', // ENUM('Entrada','Salida')
//     'fecha_movimiento' => 0 // CURRENT_TIMESTAMP
// );
// // $movimiento->update($update_movimientos);


// // Eliminacion de movimiento
// echo '<h1>Eliminar movimientos</h1>';
// // $movimiento->delete(1);

// echo '<h1>Movimientos Disponibles</h1>';
// // Ejecuta el método read del objeto. Si envia parametro
// // trae el resultado con el id, sino trae todos los resultados
// $movimiento_data = $movimiento->read();
// // var_dump($movimiento_data);

// echo '<ul>';

// foreach ($movimiento_data as $value) {
// 	echo '<li> movimiento: ' . $value['id'] . ' - ' . $value['tipo_movimiento'] . ' - '. $value['fecha_movimiento'] . '</li>';
// }

// echo '</ul>';