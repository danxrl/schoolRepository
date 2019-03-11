<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../tools/css/bootstrap.min.css">
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <title>Encriptar con complemento A1</title>
</head>

<body>
    <div class="container">
        <div>
            <br/>
            <p class="text-justify">
                Sistema que recibe un archivo de texto (con extensión .txt) y lo encripta convirtiendolo a valores binarios con un complemento A1.
            </p>
            <hr>

            <div class=text-center id="encriptar">
                <form method="post">
                    <label for="caja_busqueda">Escriba el nombre del archivo: </label>
                    <input type="text" name="caja_busqueda" id="caja_busqueda" />
                    <input type="button" value="Encriptar" onclick="_encriptar(1);">
                    <input type="button" value="Desencriptar" onclick="_encriptar(2);">
                </form>
            </div>

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
    function _encriptar(tipo) {
        var consulta = document.getElementById("caja_busqueda").value
        $.ajax({
            url: 'encriptaA1.php',
            type: 'POST',
            dataType: 'html',
            data: {
                consulta: consulta,
                tipo: tipo
            },
            beforeSend: function() {
                document.getElementById('loading').style.display = "block";
                document.getElementById('loading').innerHTML = "<img src='loading.gif' width='150' heigth='150'>"
            }
        })
        .done(function(respuesta) {
            document.getElementById('loading').style.display = "none";
            $("#datos").html(respuesta);
        })
        .fail(function() {
            console.log("error");
        })
    }
</script>