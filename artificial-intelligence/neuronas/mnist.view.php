<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MNIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../tools/css/bootstrap.min.css" />
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <script src="../tools/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        <form method="post">
            <label for="file_number">Escriba el número de imagen del archivo MNIST: </label>
            <input type="number" min="1" max="10000" name="file_number" id="file_number"></input>
            <input type="button" value="Enviar" onclick="mnist();">
        </form>
    </div>
    <div class="container" id="mnist">

    </div>
</body>
</html>

<script type="text/javascript">
    function mnist() {
        var file_number = document.getElementById("file_number").value
        console.log(file_number);
        
        $("#mnist").html('<h1>Cargando...</h1>');

        $.ajax({
            url: 'mnist.php',
            type: 'POST',
            dataType: 'html',
            data: {file_number: file_number}
        })
        .done(function(respuesta) {

            $("#mnist").html(respuesta);
        })
        .fail(function () {
            console.log("error");
        })
    }
</script>