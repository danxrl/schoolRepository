<input type="search" placeholder="BUSCAR . . ." class="form-control btn btn-principal" id="searchTerm" onkeyup="doSearch()"/>
<div id="dor" class="text-center">
    <table id="datos" border="20">
        <thead>
            <tr>
                <th>Descripción</th><th>Mes</th><th>Costo</th>
            </tr>
        </thead>

        <tr>
            <td>Agua</td><td>Enero</td><td>$ 3,000</td>
        </tr>
        <tr>
            <td>Luz</td><td>Febrero</td><td>$ 5,500</td>
        </tr>
        <tr>
            <td>Coche</td><td>Marzo</td><td>$ 10,100</td>
        </tr>


    </table>
</div>

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