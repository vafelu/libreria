<?php
if(!isset($_SESSION)){ session_start(); }

if($_SESSION["id_u"] === NULL){
    header("Location: ../../index.php");
} else {
    require_once("../system/globals.php");
    require_once("../system/Database.php");
    require_once("../system/Querys.php");
    
    $q = new Querys();
    $l = $q->libros();
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de libros</title>
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
    <section>
        <?php
        if($l){
            $t = "<table class='table table-striped'>";
            $t .= "<thead>
                <tr>
                <td>No.</td>
                <td>Libro</td>
                <td>Autor</td>
                <td>Editorial</td>
                <td></td>
                </tr>
                </thead>";
            $c = 1;
            foreach ($l as $row_l) {
                $estado = ($row_l["estado"] == 1) ? "info" : "danger";
                $t .= "<tr>";
                $t .= "<td>" . $c . "</td>";
                $t .= "<td>" . $row_l["libro"] . "</td>";
                $t .= "<td>" . $row_l["autor"] . "</td>";
                $t .= "<td>" . $row_l["editorial"] . "</td>";
                $t .= "<td> <a href='libros-edit.php?lb=".$row_l["id_libro"]."'><button class='btn btn-$estado'>Editar</button></a> </td>";
                $t .= "</tr>";
                $c++;
            }
            $t .= "</table>";
            
            echo $t;
        }
        ?>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>