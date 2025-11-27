<?php
define('WEBSITE_TITLE', 'palmsol TECHNOLOGY');

// Set environment: 'local' or 'live'
define('ENVIRONMENT', 'local'); // change to 'live' on your server


// Auto-detect environment
if (in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1'])) {
    define('ENVIRONMENT', 'local');
} else {
    define('ENVIRONMENT', 'live');
}
// Local DB credentials
$localDb = [
    'host' => 'localhost',
    'user' => 'dew_web',
    'pass' => 'Alaba@30',
    'name' => 'palmsol_blog',
    'type' => 'mysql',
];

// Live DB credentials
$liveDb = [
    'host' => 'live_host_address',
    'user' => 'palmsolt_db',
    'pass' => 'palmsol@optiwebtcd1',
    'name' => 'palmsolt_db',
    'type' => 'mysql',
];

// Pick DB config based on environment
if (ENVIRONMENT === 'live') {
    define('DB_HOST', $liveDb['host']);
    define('DB_USER', $liveDb['user']);
    define('DB_PASS', $liveDb['pass']);
    define('DB_NAME', $liveDb['name']);
    define('DB_TYPE', $liveDb['type']);
} else {
    define('DB_HOST', $localDb['host']);
    define('DB_USER', $localDb['user']);
    define('DB_PASS', $localDb['pass']);
    define('DB_NAME', $localDb['name']);
    define('DB_TYPE', $localDb['type']);
}

// Theme
define('THEME', 'palmsol/');

// Debug
define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}
