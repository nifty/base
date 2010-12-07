<?php

Class StdUtils {
	
	public static function obfuscateEmail($email) {
		$obfuscatedEmail = '';
		for ($i = 0; $i < strlen($email); $i++) {
			$obfuscatedEmail .= '&#' . ord($email[$i]) . ';';	
		}
				
		return $obfuscatedEmail;
	}
	
	
	public static function getPageTitle() {
		if (Registry::get('controller') === Registry::get('config.indexController')) {
			$pageTitle = Registry::get('config.siteName');
		} else {
			$pageTitle = sprintf(Registry::get('config.pageTitle'), Registry::get('objVars.title'));
		}
		
		return $pageTitle;
	}
	
}