<?php
require_once("assets/php/system/globals.php");
require_once(SYS_PATH_PHP . "Database.php");
require_once(SYS_PATH_PHP . "Querys.php");

$q = new Querys();
$l = $q->libros();

if($l){
    $html = '<section class="row">';
    foreach($l as $row_l){
       $html .= '<article class="col-md-3">';
       if(!empty($row_l["caratula"])){
           if(file_exists("imagenes/".$row_l["caratula"])){
               $html .= '<img src="imagenes/'.$row_l["caratula"].'" width="50" height="50">';
           } else {
               $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
           }
       } else {
           $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
       }
        $html .= (!empty($row_l["libro"])) ? $row_l["libro"] : "";
        $html .= (!empty($row_l["autor"])) ? "<br>".$row_l["autor"] : "";
        
       $html .= '</article>';
    }
    $html .= '</section>';
    
        
    
    echo $html;
}

exit();
