<?php

$transporte = new TransporteController();
$transporte_data = $transporte->read();
?>

<section class="content-form" id="transporte_form">
    <h2 class="sub-title">Seccion de transportes</h2>
    <div class="form-group width-12">
        <form method="post">
            <input type="hidden" name="r" value="transporte-add">
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
                <th>Descripcion</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($transporte_data as $data): ?>
            <tr>
                <td style="width: 100px;"><?php echo $data['id']; ?></td>
                <td style="width: 450px;"><?php echo $data['descripcion']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="transporte-edit">
                        <input type="hidden" name="transporte_id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Actualizar" class="form-control btn btn-principal"/>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="r" value="transporte-delete">
                        <input type="hidden" name="transporte_id" value="<?php echo $data['id'] ?>">
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
