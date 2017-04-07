<?php
if(!isset($_SESSION)){ session_start(); }

if($_SESSION["id_u"] === NULL){
    header("Location: ../../index.php");
} 

if(isset($_GET["lb"]) && !empty($_GET["lb"])){
    require_once("../system/globals.php");
    require_once("../system/Database.php");
    require_once("../system/Querys.php");
    
    $q = new Querys();
    $l = $q->detLibro($_GET["lb"]);
} else {
    header("Location: libros.php");
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edicion de libros</title>
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
            $t = "<form id='edit' class='col-lg-5'>";
            $c = 1;
            foreach ($l as $row_l) {
                $t .= "<div class='form-group'><label for='nombre'>Titulo: </label>
<input type='text' id='nombre' class='form-control' value='". $row_l["libro"] ."'></div>";
$t .= "<div class='form-group'><label for='fecha'>Fecha: </label>
<input type='text' id='fecha' class='form-control' value='". $row_l["fecha"] ."'></div>";
$t .= "<div class='form-group'><label for='caratula'>Caratula: </label>
<input type='text' id='caratula' class='form-control' value='". $row_l["caratula"] ."'></div>";
$t .= "<div class='form-group'><label for='inventario'>Inventario: </label>
<input type='text' id='inventario' class='form-control' value='". $row_l["inventario"] ."'></div>";
$t .= "<div class='form-group'><label for='precio'>Precio: </label>
<input type='text' id='precio' class='form-control' value='". $row_l["precio"] ."'></div>";
$t .= "<div class='form-group'><label for='pagina'>No. de paginas: </label>
<input type='text' id='pagina' class='form-control' value='". $row_l["paginas"] ."'></div>";
$t .= "<div class='form-group'><label for='descripcion'>Descripcion: </label>
<input type='text' id='descripcion' class='form-control' value='". $row_l["descripcion"] ."'></div>";
$t .= "<div class='form-group'><label for='codigo'>Codigo: </label>
<input type='text' id='codigo' class='form-control' value='". $row_l["codigo"] ."'></div>";
$t .= "<div class='form-group'><label for='url'>URL: </label>
<input type='text' id='url' class='form-control' value='". $row_l["url"] ."'></div>";
if($row_l["estado"] == 0){ $estadoSelect = "<option value='0' selected>Seleccione</option>"; } else { $estadoSelect = "<option value='0'>Seleccione</option>"; }
if($row_l["estado"] == 1){ $estadoSelect .= "<option value='1' selected>Activo</option>"; } else { $estadoSelect .= "<option value='0'>Activo</option>"; }
if($row_l["estado"] == 2){ $estadoSelect .= "<option value='2' selected>Inactivo</option>"; } else { $estadoSelect .= "<option value='0'>Inactivo</option>"; }

$t .= "<div class='form-group'><label for='estado'>Estado: </label>
<select name='estado' id='estado'>" . $estadoSelect . "</select>";
$t .= "<div class='form-group'><label for='autor'>Autor: </label>
<input type='text' id='autor' class='form-control' value='". $row_l["autor_id"] ."'></div>";
$t .= "<div class='form-group'><label for='editorial'>Editorial: </label>
<input type='text' id='editorial' class='form-control' value='". $row_l["editorial_id"] ."'></div>";
$t .= "<div class='form-group'><label for='genero'>Genero: </label>
<input type='text' id='genero' class='form-control' value='". $row_l["genero_id"] ."'></div>";
                $c++;
            }
            $t .= "</form>";
            
            echo $t;
        }
        ?>
    </section>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>