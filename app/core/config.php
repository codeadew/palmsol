<?php

define('WEBSITE_TITLE', 'Aradi fabrics');

//DB connect parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'aradifab_root');
define('DB_PASS', 'gq)u{]HJn}3t');
define('DB_NAME', 'aradifab_products');
define('DB_TYPE', 'mysql');

define('THEME', 'palmsol/');
//DEBUD

define('DEBUG', true);

if (DEBUG) {
	ini_set('displace_errors', 1);
}else{
	ini_set('displace_errors', 0);
}




