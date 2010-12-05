<?php

class contentController extends BaseController {
	
	public function index($view) {
		$view->setCanvas('default');
		$view->setTemplate('article');
		
		$rtParts = explode('/', $_GET['rt']);
		if ($rtParts[0] === 'content') {
			$objName = $rtParts[1];
		} else {
			$objName = $rtParts[0];
		}
		
		$objDataFile = BASE_PATH . '_data/' . $objName . '.php';
		if (file_exists($objDataFile)) {
			include $objDataFile;
		}
		
		$view->renderTemplate();
	}
	
}