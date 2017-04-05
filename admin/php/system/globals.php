<?php
//error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();

date_default_timezone_set('America/Bogota');

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define("SYS_PATH_PHP", "assets" . DS . "php" . DS . "system" . DS);
define("GEN_PATH_PHP", "assets" . DS . "php" . DS . "generales" . DS);
define("CON_PATH_PHP", "assets" . DS . "php" . DS . "contenidos" . DS);

header('Content-type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('x-content-type-options:nosniff');
header('x-xss-protection:1; mode=block');
header('x-frame-options:SAMEORIGIN');
header('strict-transport-security:max-age=31536000; includeSubDomains; preload');