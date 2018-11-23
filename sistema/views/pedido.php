<?php

$pedido_controller = new PedidoController();
$pedido_data = $pedido_controller->read();
$cliente_controller = new ClienteController();
$cliente_data = $cliente_controller->read();


?>

<section class="content-form" id="pedido_form">
    <h2 class="sub-title">Seccion de pedidos</h2>
    <div class="form-group width-12">
        <form method="post">
            <input type="hidden" name="r" value="pedido-add">
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
                <th>Cliente</th>
                <th>Fecha</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedido_data as $data): ?>
            <tr>
                <td style="width: 70px;"><?php echo $data['id']; ?></td>
                <?php foreach($cliente_data as $cliente): ?>
                    <?php if($data['cliente_id'] == $cliente['id']) echo '<td style="width: 350px;">' . $cliente['nombre'] . '</td>' ?>
                <?php endforeach; ?>
                <td style="width: 350px;"><?php echo $data['fecha_solicitud']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="pedido-edit">
                        <input type="hidden" name="pedido_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Modificar" class="form-control btn btn-principal"/>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="partida">
                        <input type="hidden" name="pedido_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Partidas" class="form-control btn btn-principal"/>
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
