<?php

$regla_controller = new ReglaController();
$regla_data = $regla_controller->read();

?>
<div class="container">
<section class="content-form" id="regla_form">
    <h2 class="sub-title">Sección de reglas</h2>
    <div class="form-group width-12">
        <form method="post">
            <input type="hidden" name="r" value="regla-add">
            <input type="submit" value="Agregar" class="form-control btn btn-principal"/>
        </form>
            <input type="search" placeholder="BUSCAR . . ." class="form-control btn expand btn-principal" id="searchTerm" onkeyup="doSearch()"/>
    </div>
</section>
<div id="dor" class="text-center">
    <table class="text-center" id="datos" border="20">
        <thead>
            <tr>
                <th>Regla</th>
                <th>Atomos</th>
                <th>Consecuente</th>
                <th>Signo</th>
                <!-- <th colspan="2">Opciones</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($regla_data as $data): ?>
            <tr>
                <td style="width: 100px;"><?php echo $data['idr']; ?></td>
                <td style="width: 100px;"><?php echo $data['atomos']; ?></td>
                <td style="width: 100px;"><?php echo $data['consecuente']; ?></td>
                <td style="width: 450px;"><?php echo $data['signo']; ?></td>
            </tr>        
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
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
