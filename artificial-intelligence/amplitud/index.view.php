<head>
    <title>Amplitud</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <h1 class="text-justify">
                Busqueda por amplitud
            </h1>
            <p class="text-justify">
                Busqueda con menor cantidad de brincos. El orden en que se abren (orden de entrada
                de nodos abiertdos) es el orden en que son visitados los nodos (nodos cerrados).
            </p>
            <hr>
            <div id="node_start">
                <label for="start">Ingresa el nodo inicial: </label>
                <input type="text" name="start" id="start"></input>
            </div>
            <div id="node_final">
                <label for="final">Ingresa el nodo final: </label>
                <input type="text" name="final" id="final"></input>
            </div>
            <div id="button">              
                <button class="btn waves-effect waves-light" id="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        <hr>
        <div class="contenido">
            <ul id="datos"></ul>            
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    function search() {
        var start = document.getElementById('start').value;
        var final = document.getElementById('final').value;
        buscar_datos(start, final);
    }

    function buscar_datos(start, final){

        $("#datos").html('<img style="margin:10px auto; display:block; width:100px;" src="../sources/img/loading.gif" alt="loading...">');

        $.ajax({
            url: 'amplitud.php',
            type: 'POST',
            dataType: 'html',
            data: {
                start: start,
                final: final
            },
        })
        .done(function(respuesta) {
            $("#datos").html(respuesta);
        })
        .fail(function() {
            console.log("error");
        })
    }

    document.getElementById('submit').onclick = function() {search()};
</script>
