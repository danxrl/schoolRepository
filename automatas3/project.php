<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../tools/css/bootstrap.min.css">
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <title>Autómata 3</title>
</head>
<body>
    <div class="container">
        <div>
            <br/>
            <p class="text-justify">
                Sistema que reciba como entrada una tabla de Transición de un Autómata Finito no Determinista 
                 y Genere la tabla de transición a un Autómata Finito Determinista Equivalente.
            </p>            
            <hr>
            <div class=text-center id="num_datos">
                <form method="post">
                    <label for="num_estados">Ingresa el número de estados del autómata: </label>
                    <input type="number" name="num_estados" id="num_estados"></input>
                    <input type="button" value="Enviar" onclick="enviar_num_estados();">
                </form>
            </div>
            <div class="text-center" id="datos">
                
            </div>
            <div class="text-center" id="estados">
            
            </div>
            <div class="text-center" id="num_ent">
            
            </div>
            <div class="text-center" id="entradas">
            
            </div>
            <div class="text-center" id="tabla">
            
            </div>
        </div>
        <hr>
    </div>
</body>
</html>

<script type="text/javascript">
    function enviar_num_estados() {
        var num_estados = document.getElementById("num_estados").value
        console.log(num_estados);
        
        $.ajax({
            url: 'num_estados.php',
            type: 'POST',
            dataType: 'html',
            data: {num_estados: num_estados}
        })
        .done(function(respuesta) {
            $("#num_datos").hide();
            $("#datos").html(respuesta);
        })
        .fail(function () {
            console.log("error");
        })
    }
</script>
