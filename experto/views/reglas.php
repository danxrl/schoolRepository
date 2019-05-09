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
            <input type="submit" value="Agregar" class="form-control btn btn-principal bg-primary text-white"/>
        </form>
            <input type="search" placeholder="BUSCAR . . ." class="form-control btn expand btn-principal" id="searchTerm" onkeyup="doSearch()"/>
    </div>
</section>
<div id="dor" class="text-center">
    <table class="text-center table table-dark table-striped" id="datos">
        <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Regla</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < sizeof($regla_data['reglas']); $i++): ?>
            <tr>
                <td style="width: 100px;"><?php echo $regla_data['reglas'][$i]; ?></td>
                <td style="width: 400px;"><?php echo '<b style="color: RED">' . $regla_data['antecedentes'][$i] . ' </b><b> -> </b><b style="color: GREEN;"> ' . $regla_data['consecuentes'][$i] . '</b>'; ?></td>
            </tr>        
            <?php endfor; ?>
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
