<head>
    <title>Profundidad iterativa</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <h1 class="text-justify">
                Busqueda por profundidad iterativa
            </h1>
            <p class="text-justify">
                
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
            <div id="limite_prof">
                <label for="limite">Ingresa límite de profundidad de busqueda: </label>
                <input type="number" name="limite" id="limite"></input>
            </div>
            <div id="iteracion">
                <label for="iteracion">Ingresa la iteración de busqueda: </label>
                <input type="number" name="iteracion" id="iteracion"></input>
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
        var limite = document.getElementById('limite').value;
        var iteracion = document.getElementById('iteracion').value;
        buscar_datos(start, final, limite, iteracion);
    }

    function buscar_datos(start, final, limite, iteracion){

        $("#datos").html('<img style="margin:10px auto; display:block; width:100px;" src="../sources/img/loading.gif" alt="loading...">');

        $.ajax({
            url: 'profundidad-limitada.php',
            type: 'POST',
            dataType: 'html',
            data: {
                start: start,
                final: final,
                limite: limite,
                iteracion: iteracion
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