<?php
require_once("../system/globals.php");
require_once("../system/Database.php");
require_once("../system/Querys.php");

$q = new Querys();
$d = array($_POST["u"], $_POST["c"]);
$l = $q->login($d);

if($l && $l != false){
    foreach($l as $l_row){
        session_start();
        session_regenerate_id(true);
        
        $_SESSION["id_u"] = $l_row["id_usuario"];
    }
    
    echo "php/contenidos/menu.php";
    exit();
} else {
    echo "error";
    exit();
}