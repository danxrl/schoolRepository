<?php

$inventario_controller = new MovimientoController();
$movimiento_data = $inventario_controller->mov_por_almacen('almacenGDL');
$material_controller = new MaterialController();
$material_data = $material_controller->read();

?>

<section class="content-form" id="movimiento_form">
    <h2 class="sub-title">Movimientos de almacen</h2>
    <div class="form-group width-12">
            <input type="search" placeholder="BUSCAR . . ." class="form-control btn expand btn-principal" id="searchTerm" onkeyup="doSearch()"/>
    </div>
    </section>
<div id="dor" class="text-center">
    <table class="text-center" id="datos" border="20">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($movimiento_data as $data): ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <?php foreach($material_data as $material): ?>
                    <?php if($data['material_id'] == $material['id']) echo '<td>' . $material['descripcion'] .'</td>'; ?>
                <?php endforeach; ?>
                <td><?php echo $data['cantidad']; ?></td>
                <td><?php echo $data['tipo_movimiento']; ?></td>
                <td><?php echo $data['fecha_movimiento']; ?></td>
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