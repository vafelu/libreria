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
    $a = $q->autores();
    $g = $q->generos();
    $e = $q->editoriales();
    
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
            foreach ($l as $row_l) {
                $estadoSelect = "";
                for ($i = 0; $i < 3; $i++) {
                    switch ($i) {
                        case 0:
                            $nombre = "Seleccione...";
                            break;
                        
                        case 1:
                            $nombre = "Activo";
                            break;
                        
                        case 2:
                            $nombre = "Inactivo";
                            break;
                        
                        default:
                            $nombre = "Seleccione...";
                            break;
                    }
                    
                    if($i == $row_l["estado"]){
                        $estadoSelect .= "<option value='".$i."' selected>".$nombre."</option>";
                    } else {
                        $estadoSelect .= "<option value='".$i."'>".$nombre."</option>";
                    }
                }
                
                $autores = "";
                foreach ($a as $row_a) {
                    if($row_l["autor_id"] == $row_a["id_autor"]){
                        $autores .= "<option value='".$row_a["id_autor"]."' selected>".$row_a["autor"]."</option>";
                    } else {
                       $autores .= "<option value='".$row_a["id_autor"]."'>".$row_a["autor"]."</option>"; 
                    }
                }
                
                $generos = "";
                foreach ($g as $row_g) {
                    if($row_l["genero_id"] == $row_g["id_genero"]){
                        $generos .= "<option value='".$row_g["id_genero"]."' selected>".$row_g["genero"]."</option>";
                    } else {
                       $generos .= "<option value='".$row_g["id_genero"]."'>".$row_g["genero"]."</option>"; 
                    }
                }
                
                $editoriales = "";
                foreach ($e as $row_e) {
                    if($row_l["editorial_id"] == $row_e["id_editorial"]){
                        $editoriales .= "<option value='".$row_e["id_editorial"]."' selected>".$row_e["editorial"]."</option>";
                    } else {
                       $editoriales .= "<option value='".$row_e["id_editorial"]."'>".$row_e["editorial"]."</option>"; 
                    }
                }
                
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
$t .= "<div class='form-group'><label for='estado'>Estado: </label>
<select name='estado' id='estado' class='form-control'>" . $estadoSelect . "</select></div>";
$t .= "<div class='form-group'><label for='autor'>Autor: </label>
<select id='autor' class='form-control'>".$autores."</select></div>";
$t .= "<div class='form-group'><label for='editorial'>Editorial: </label>
<select id='editorial' class='form-control'>".$editoriales."</select></div>";
$t .= "<div class='form-group'><label for='genero'>Genero: </label>
<select id='genero' class='form-control'>".$generos."</select></div>";
            }
            $t .= "<input type='hidden' value='".$_GET["lb"]."' name='idLibro' id='idLibro'>";
            $t .= "<div class='form-group'>
                    <button class='btn btn-default' id='btn-edit'>Actualizar</button></div>";
            $t .= "</form>";
            
            echo $t;
        }
        ?>
    </section>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualización de información</h4>
          </div>
          <div class="modal-body">
            La información del libro ha sido actualizada.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="save">Volver al listado</button>
          </div>
        </div>
      </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#btn-edit").on("click", function(e){
            e.preventDefault();
            var fn = $("#nombre").val();
            var ff = $("#fecha").val();
            var fc = $("#caratula").val();
            var fi = $("#inventario").val();
            var fp = $("#precio").val();
            var fpg = $("#pagina").val();
            var fd = $("#descripcion").val();
            var fcd = $("#codigo").val();
            var fu = $("#url").val();
            var fe = $("#estado").val();
            var fa = $("#autor").val();
            var fg = $("#genero").val();
            var fed = $("#editorial").val();
            var fid = $("#idLibro").val();
            
            $.ajax({
                method : "post",
                url : "../system/edit-libro.php",
                data : {nombre : fn, fecha : ff, caratula : fc, inventario : fi, precio : fp, paginas : fpg, descripcion : fd, codigo: fcd, url: fu, estado : fe, autor: fa, genero : fg, editorial : fed, idlibro :  fid}
            }).done(function(msg) {
                console.log(msg);
                if(msg == "ok"){
                    $("#myModal").modal();
                }
            });
        });
        
        $("#save").on("click", function(){
            document.location = "libros.php"
        });
    });
</script>
</body>
</html>



