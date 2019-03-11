<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cervantino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../tools/css/bootstrap.min.css" />
    <script src="../tools/jquery-3.3.1.min.js"></script>
    <script src="../tools/js/bootstrap.min.js"></script>
</head>
<body>
<br>
    <div class="container">
        <form method="post">
            <label for="parking">¿Hay estacionamiento?</label>
            <input type="checkbox" name="parking" id="parking" value="true"><br>
            <label for="wife">¿Irá su esposa?</label>
            <input type="checkbox" name="wife" id="wife" value="true"><br>
            <label for="money">¿Tiene dinero?</label>
            <input type="checkbox" name="money" id="money"><br>
            <input type="button" value="Enviar" onclick="viaje();">
        </form>
    </div>
    <br>
    <div class="container" id="viaje">

    </div>
</body>
</html>

<script type="text/javascript">
    function viaje() {
        if(document.getElementById("parking").checked) {
            var parking = 1;
        } else {
            var parking = 0;
        }
        
        if(document.getElementById("wife").checked) {
            var wife = 1;
        } else {
            var wife = 0;
        }
        
        if(document.getElementById("money").checked) {
            var money = 1;
        } else {
            var money = 0;
        }
        
        $.ajax({
            url: 'viaje.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'parking': parking,
                'wife': wife,
                'money': money
            }
        })
        .done(function(respuesta) {
            $("#viaje").html(respuesta);
        })
        .fail(function () {
            console.log("error");
        })
    }
</script>