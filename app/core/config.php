<?php

define('WEBSITE_TITLE', 'palmsol TECHNOLOGY');

//DB connect parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'dew_web');
define('DB_PASS', 'Alaba@30');
define('DB_NAME', 'palmsol_blog');
define('DB_TYPE', 'mysql');

define('THEME', 'palmsol/');
//DEBUD

define('DEBUG', true);

if (DEBUG) {
	ini_set('displace_errors', 1);
}else{
	ini_set('displace_errors', 0);
}




