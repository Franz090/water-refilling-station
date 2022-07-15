<?php
date_default_timezone_set('Asia/manila');

// live database
// define('DB_TYPE', 'mysql');
// define('DB_HOST', 'octanepayments.com');
// define('DB_NAME', 'octanepayments');
// define('DB_USER', 'octaneadmin');
// define('DB_PASS', 'm0unta1nd3w1A!');

//test database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'water_refilling_station');
define('DB_USER', 'root');
define('DB_PASS', '');

//urls
define('DATABASE_DRIVER', 'PDO');
define('URL', 'http://localhost/water-refilling-station/');
define( "CURDATE", date( "Y-m-d H:i:s" ) );
define('LIBRARY', 'app/libs/');
define('JS_PATH', URL.'public/js/');
define('CSS_PATH', URL.'public/css/');
define('ASSETS_PATH', URL.'public/assets/');
define('IMG_PATH', URL.'public/img/');
define('UPLOADS_PATH', URL.'app/uploads/');

