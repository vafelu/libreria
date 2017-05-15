<?php
require_once("../system/globals.php");
require_once("../system/Database.php");
require_once("../system/Querys.php");

if(isset($_POST["i"]) && !empty($_POST["i"])){
    $d = json_decode($_POST["i"], TRUE);
    
    echo $d["libro"];

}
/*$q = new Querys();
$l = $q->libros();

if($l){
    $c = 0;
    $html = '<section class="row">';
    foreach($l as $row_l){
        if($c%4 == 0){
            $html .= '<div class="row">';
        }
       $html .= '<article class="col-md-3 libro__info">';
       $html .= '<a href="' . $row_l["url"] . '">';
       $html .= "<figure class='libro__img'>";
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
        $html .= (!empty($row_l["libro"])) ? "<h3>" . $row_l["libro"] . "</h3>" : "";
        $html .= "</a>";
        $html .= (!empty($row_l["autor"])) ? "<p><em>".$row_l["autor"] . "</em></p>" : "";
        $html .= (!empty($row_l["fecha"])) ? "<p>".$row_l["fecha"] . "</p>" : "";
        $html .= (!empty($row_l["genero"])) ? "<p>".$row_l["genero"]  . "</p>" : "";
        $html .= (!empty($row_l["editorial"])) ? "<p><strong>".$row_l["editorial"] . "</strong></p>" : "";
        $html .= (!empty($row_l["precio"])) ? "<p> $ ".$row_l["precio"] . "</p>" : "";
       $html .= '</article>';
       $c++;
       if($c%4 == 0){
          $html .= "</div>"; 
       }
    }
    $html .= '</section>';
    
        
    
    echo $html;
}*/
