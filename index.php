<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
// Ensure the error log directory exists and is writable
$logDir = __DIR__;
$logFile = $logDir . '/error.log';
if (!is_dir($logDir) || !is_writable($logDir)) {
	error_log("Log directory does not exist or is not writable: $logDir");
}
ini_set('error_log', $logFile);

session_start();



$path = $_SERVER['REQUEST_SCHEME'] ."://". $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT', $path);
define('ASSETS', $path."assets/");


// Include the init.php file from the app directory
include "app/init.php";

// Start the app (instantiates the App class)
$app = new App();

