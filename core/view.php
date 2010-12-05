<?php

class View {
	
	private $_canvas;
	private $_template;
	private $_vars;
	
	function __construct() {}
	
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