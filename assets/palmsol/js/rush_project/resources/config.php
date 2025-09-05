<?php


ob_start();
session_start();



defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? NULL : define("TEMPLATE_FRONT",__DIR__.DS."template/front");
defined("TEMPLATE_BACK") ? NULL : define("TEMPLATE_BACK",__DIR__.DS."template/back");



$servername = "localhost";
$username = "root";
$password = "Alaba@30";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

include_once('function.php');
    
// Check connection

?>
