<?php
	
session_start();

$GLOBALS['config'] = [
	'mysql' => [
		'type' =>'mysql',
		'host' =>'127.0.0.1',
		'name' =>'system_db',
		'user' =>'root',
		'pass' =>'',
	],
	'remember' => [
		'cookie_name' 	=> 'hash',
		'cookie_expiry'	=> 604800,
	],
	'session' => [
		'profile' 		=> 'user',
		'token_name' 	=> '_token'
	],
];

// require_once 'core/Route.php';
// require_once 'core/Globals.php';
// require_once 'core/Config.php';
// require_once 'core/DB.php';
// require_once 'core/Session.php';
// require_once 'core/Controller.php';

spl_autoload_register(function($class){
	// for debugging only

	// echo "<pre>";		
	// 	echo "~> ".$class;
	// echo "</pre>";

	require_once 'App/Core/'.$class.'.php';
});

// functions
require_once 'includes/constants.php';
require_once 'includes/sanitize.php';
require_once 'includes/view.php';
require_once 'Vendor/autoload.php';