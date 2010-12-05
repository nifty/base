<?php

session_start();

function __autoload($class) {
	
	$file = BASE_PATH . 'Utils/' . $class . '.php';

	if (!file_exists($file)) {
		return false;
	}
	
	include $file;
}

/**
 ** Registry - data storage
 **/

require_once BASE_PATH . 'core/registry.php';

/**
 ** Config files
 **/

require_once BASE_PATH . 'config/config.php'; 
require_once BASE_PATH . 'config/routes.php';


/**
 ** Core classes
 **/
require_once BASE_PATH . 'core/view.php';
require_once BASE_PATH . 'core/router.php';
require_once BASE_PATH . 'core/base_controller.php';


/**
 ** Set up view
 **/

$view = new View;
$Router = new Router($view);
$Router->setRoutes($routes);
$Router->setup();

unset($routes);

/**
 ** Render page
 **/
 
$canvas = APP_PATH . 'canvas/' . $view->getCanvas() . '.php';
if (file_exists($canvas)) {
	include_once $canvas;
}
unset($canvas);