<?php

class View {
	
	private static $_instance = null;
	private $_canvas;
	private $_template;
	private $_vars;
	
	function __construct() {}
	
	public static function getInstance() {
		if (!self::$_instance instanceOf View) {
			self::$_instance = new self;
		}
		
		return self::$_instance;
	}
	
	public function initCanvas() {
		include APP_PATH . 'canvas/' . $this->_canvas . '.php';
	}
	
	public function renderTemplate() {
		$template = APP_PATH . 'views/' . $this->_template . '.php';
		
		if (is_array($this->_vars) && !empty($this->_vars)) {
			extract($this->_vars);
		}
		
		ob_start();
		include $template;
		
		return ob_get_clean();
	}
	
	public function send404() {
		$this->_canvas = Registry::get('config.404Canvas');
		header('HTTP/1.0 404 Not Found');
	}
	
	public function setVars($vars) {
		$this->_vars = $vars;
		Registry::set('objVars', $vars);
	}
	
	public function setCanvas($canvas) {
		$this->_canvas = $canvas;
	}
	
	public function setTemplate($template) {
		$this->_template = $template;
	}
	
	public function getCanvas() {
		return $this->_canvas;
	}
}