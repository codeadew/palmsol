<?php
session_start();



    $path = $_SERVER['REQUEST_SCHEME'] ."://". $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT', $path);
define('ASSETS', $path."assets/");


// Include the init.php file from the app directory
include "app/init.php";

// Start the app (instantiates the App class)
$app = new App();

