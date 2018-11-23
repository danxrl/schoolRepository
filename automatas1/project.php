<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../tools/css/bootstrap.min.css">
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <title>Autómata 1</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <p class="text-justify">
                Sistema que acepta una cadena de entrada e imprime en pantalla los tokens correctos 
                que tiene la cadena, enumerarlos y mencionar la cantidad de tokens incorrectos. La 
                cadena de entrada separará con un espacio en blanco cada uno de los tokens.
            </p>
            <hr>
            <label for="caja_busqueda">Escriba la cadena: </label>
            <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
        </div>
        <hr>
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
        })
        .done(function(respuesta) {
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
