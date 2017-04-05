<?php 
session_start();
session_destroy();
session_unset();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administra tu librería</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css" type="text/css" />
</head>
<body>
    <form id="login" class="col-md-4">
  <div class="form-group">
    <label for="usuario">Usuario: </label>
    <input type="email" class="form-control" id="usuario" placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="clave">Contraseña: </label>
    <input type="password" class="form-control" id="clave" placeholder="Contraseña">
  </div>
  <button type="submit" class="btn btn-default" id="ingreso">Ingresar al sistema</button>
  
  <div class="alert alert-danger alert-dismissible" role="alert"  id="c-error">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>¡Error!</strong> Usuario y/o contraseña incorrectos.
</div>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../assets/js/sha3.min.js"></script>
    <script>
        $(function(){
            $("#ingreso").click(function(e){
                e.preventDefault();
                var u = $("#usuario").val();
                var c = sha3_512($("#clave").val());
                $("#login")[0].reset();
                
                $.ajax({
                    method: "post",
                    url: "php/login/index.php",
                    data: {u: u, c: c}
                }).done(function(msg) {
                    if(msg == "error"){
                        $("#c-error").show(300);
                    } else {
                        document.location = msg;
                    }
                }).fail(function(msg) {
                    $("#c-error").show(300);
                });
            });
        });
    </script>
</body>
</html>