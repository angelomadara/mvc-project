<?php

// host settings
// $HOST = $_SERVER['HTTP_HOST'].'/project-x';
$HOST = $_SERVER['HTTP_HOST'];

// database settings
// define('DB_TYPE', 'mysqli');
// define('DB_HOST', '127.0.0.1');
// define('DB_NAME', 'ampc');
// define('DB_USER', 'root');
// define('DB_PASS', '');

// HOST
define('DOMAIN_NAME', 'http://'.$HOST);

// cascading style sheets location
define('CSS_ADDR', DOMAIN_NAME.'/public/assets/css');

// javascripts locations
define('JS_ADDR', DOMAIN_NAME.'/public/assets/js');


