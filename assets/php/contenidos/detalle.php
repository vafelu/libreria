<?php
require_once("assets/php/system/globals.php");
require_once(SYS_PATH_PHP . "Database.php");
require_once(SYS_PATH_PHP . "Querys.php");

$q = new Querys();
$l = $q->detLibro($_GET["menu"]);
$s = $q->sugeridos($_GET["menu"]);

if($l){
    $html = '<section class="row">';
    foreach($l as $row_l){
       $html .= '<article class="col-md-12 libro__info">';
       $html .= "<figure class='libro__img col-md-4
       '>";
       if(!empty($row_l["caratula"])){
           if(file_exists("imagenes/".$row_l["caratula"])){
               $html .= '<img src="imagenes/'.$row_l["caratula"].'" width="50" height="50">';
           } else {
               $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
           }
       } else {
           $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
       }
       $html .= '</figure>';
       $html .= '<div class="col-md-8">';
        $html .= (!empty($row_l["libro"])) ? "<h3>" . $row_l["libro"] . "</h3>" : "";
        $html .= (!empty($row_l["autor"])) ? "<p><em>".$row_l["autor"] . "</em></p>" : "";
        $html .= (!empty($row_l["fecha"])) ? "<p>".$row_l["fecha"] . "</p>" : "";
        $html .= (!empty($row_l["genero"])) ? "<p>".$row_l["genero"]  . "</p>" : "";
        $html .= (!empty($row_l["editorial"])) ? "<p><strong>".$row_l["editorial"] . "</strong></p>" : "";
        $html .= (!empty($row_l["precio"])) ? "<p> $ ".$row_l["precio"] . "</p>" : "";
        $html .= (!empty($row_l["inventario"])) ? "<p>".$row_l["inventario"] . "</p>" : "";
        $html .= (!empty($row_l["codigo"])) ? "<p>".$row_l["codigo"] . "</p>" : "";
        $html .= (!empty($row_l["descripcion"])) ? "<p>".nl2br($row_l["descripcion"]) . "</p>" : "";
        $html .= "</div>";
       $html .= '</article>';
    }
    $html .= '</section>';
    
    if($s){
        $html .= "<div class='co-md-12'>";
        foreach($s as $row_s){
            $html .= "<figure class='col-md-2'>";
        if(!empty($row_s["caratula"])){
           if(file_exists("imagenes/".$row_s["caratula"])){
               $html .= '<img src="imagenes/'.$row_s["caratula"].'" width="50" height="50">';
           } else {
               $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
           }
       } else {
           $html .= '<img src="imagenes/libro.jpeg" width="50" height="50">';
       }
       $html .= "<figcaption>".$row_s["libro"]."</figcaption>";
       $html .= "</figure>";
        }
        
        $html .= "</div>";
    }
    
        
    
    echo $html;
}

exit();
