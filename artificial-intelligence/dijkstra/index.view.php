<head>
    <title>Dijkstra</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <h1 class="text-justify">
                Algoritmo de Dijkstra
            </h1>
            <p class="text-justify">
                Algoritmo de Dijkstra. También llamado algoritmo de caminos mínimos, 
                es un algoritmo para la determinación del camino más corto dado un 
                vértice origen al resto de vértices en un grafo con pesos en cada arista. 
                Su nombre se refiere a Edsger Dijkstra, quien lo describió por primera vez en 1959. 
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
    function buscar_datos(start, final){

        $("#datos").html('<img style="margin:10px auto; display:block; width:100px;" src="../sources/img/loading.gif" alt="loading...">');

        $.ajax({
            url: 'dijkstra.php',
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
    
    function search() {
        var start = document.getElementById('start').value;
        var final = document.getElementById('final').value;
        buscar_datos(start, final);
    };
</script>
