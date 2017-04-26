<?php
require_once("assets/php/system/globals.php");
require_once(SYS_PATH_PHP . "Database.php");
require_once(SYS_PATH_PHP . "Querys.php");

$q = new Querys();
$menu = $q->menu();

echo '<nav class="navbar navbar-inverse">
      <a class="navbar-brand" href="/">Librería</a>';

if($menu){
    echo "<ul class='nav nav-pills'>";
    foreach($menu as $row_menu){
        echo "<li><a href='javascript:;'>" . $row_menu["genero"] . "</a></li>";
    }
    echo "</ul>";
}

echo '</nav>';