<?php

class homeController extends BaseController {

	public function index($view) {
		$view->setCanvas('default');
		$view->setTemplate('frontpage');
		
		$view->renderTemplate();
	}
	
}