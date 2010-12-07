<?php

class DataModel {
	
	private static $_instance;
	
	public static function getInstance() {
		if ($_instance) {
			return $_instance;	
		}
		$instance = new self;
		self::$_instance = $instance;
		
		return new $instance;
	}
	
	public function getData($dataId) {
		$view = View::getInstance();
		$objDataFile = APP_PATH . '_data/' . $dataId . '.php';
		
		if (file_exists($objDataFile)) {
			include $objDataFile;
					
			return $_data;
		} else {
			$view->send404();
		}
	}
	
}