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
		
		$vars = DataModel::getInstance()->getData($objName);
		$view->setVars($vars);
		$view->renderTemplate();
	}
	
}