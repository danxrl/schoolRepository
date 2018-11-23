<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../tools/css/bootstrap.min.css">
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <title>Autómata 4</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <p class="text-justify">
                Sistema que recibe un archivo de texto (con extensión .txt), el documento contendrá
                un escrito con exclusivamente cadenas de texto, el objetivo del sistema es identificar
                en el archivo las coincidencias de las siguientes dos palabras: Web y Ebay.
            </p>
            <p class="text-justify">
                Al final el sistema deberá imprimir cuantas coincidencias encontró de cada palabra.
            </p>
            <hr>
            <label for="caja_busqueda">Escriba el nombre del archivo: </label>
            <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
            <p class="text-justify">*El archivo deberá encontrarse en el escritorio.</p>
        </div>
        <hr>
        <div id="loading" style="display:none">
        
        </div>
        <div class="contenido">
            <ul id="datos"></ul>            
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(buscar_datos());
    function buscar_datos(consulta){
        $.ajax({
            url: 'automata.php',
            type: 'POST',
            dataType: 'html',
            data: {consulta: consulta},
            beforeSend: function(){
                document.getElementById('loading').style.display="block";
                document.getElementById('loading').innerHTML="<img src='loading.gif' width='150' heigth='150'>"
            }
        })
        .done(function(respuesta) {
            document.getElementById('loading').style.display="none";
            $("#datos").html(respuesta);
        })
        .fail(function() {
            console.log("error");
        })
    }
    $(document).on('keyup', '#caja_busqueda', function(){
        var valor = $(this).val();
        if (valor != "") {
            buscar_datos(valor);
        } else {
            buscar_datos();
        }
    });
</script>