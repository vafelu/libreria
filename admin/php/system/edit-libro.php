<?php
if(!isset($_SESSION)){ session_start(); }

if($_SESSION["id_u"] === NULL){
    header("Location: ../../index.php");
}

if(isset($_POST)){
    //echo var_dump($_POST);
    $datos = array($_POST["nombre"], $_POST["fecha"], $_POST["caratula"], $_POST["inventario"], $_POST["precio"], $_POST["paginas"], $_POST["descripcion"], $_POST["codigo"], $_POST["url"], $_POST["estado"], $_POST["autor"], $_POST["editorial"], $_POST["genero"], $_POST["idlibro"]);

    require_once("globals.php");
    require_once("Database.php");
    require_once("Querys.php");
    
    $q = new Querys();
    $edita = $q->actualizarLibro($datos);
    
    echo $edita;
    exit();
} else {
    header("Location: ../contenidos/libros-edit.php");
}