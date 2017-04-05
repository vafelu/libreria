<?php
 if(!isset($_SESSION)){ session_start(); }

if($_SESSION["id_u"] === NULL){
    header("Location: ../../index.php");
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Admin</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION["id_u"]; ?></h1>
</body>
</html>