<?php
if(!isset($_SESSION)){ session_start(); }

if($_SESSION["id_u"] === NULL){
    header("Location: ../../index.php");
} else {
    require_once("../system/globals.php");
    require_once("../system/Database.php");
    require_once("../system/Querys.php");
    
    $q = new Querys();
    $u = $q->dataUser($_SESSION["id_u"]);
    
    if($u){
        foreach($u as $row_u){
            $_SESSION["uNombre"] = $row_u["nombre"];
            $_SESSION["uMail"] = $row_u["mail"];
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/estilos.css" type="text/css" />
</head>
<body>
    <h1>Bienvenido: <?php echo $_SESSION["uNombre"]; ?></h1>
<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="#">Librería</a>
    <ul class='nav nav-pills'>;
        <li><a href='libros.php'>Libros</a></li>
        <li><a href='generos.php'>Generos</a></li>
    </ul>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>