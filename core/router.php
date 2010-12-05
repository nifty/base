<?php

class Router {
	
	private $_view;
	private $_routes;
	private $_canvas;
	private $_template;
	private $_route;
	
	function __construct($view) {
		$this->_view = $view;
		
		$this->_route = $_GET['rt'];
	}
	
	public function setRoutes($routes) {
		$this->_routes = $routes;
	}
	
	public function setup() {
		$parts = explode('/', $this->_route);
		
		$controller = $parts[0];
		$method = $parts[1];
		
		if (empty($controller)) {
			$controller = Registry::get('config.indexController');
		}
		if (empty($method)) {
			$method = 'index';
		}
		
		$controllerFile = BASE_PATH . 'controllers/' . $controller . '.php';
		if (!file_exists($controllerFile)) {
			$controller = Registry::get('config.defaultController');
			$controllerFile = BASE_PATH . 'controllers/' . $controller . '.php';
		}
		
		$controllerClass = $controller . 'Controller';
		
		require_once $controllerFile;
		$class = new $controllerClass;
		
		if (!method_exists($class, $method)) {
			$method = 'index';
		}
				
		$class->$method( $this->_view );
	}
	
}