<?php

Class StdUtils {
	
	public static function obfuscateEmail($email) {
		$obfuscatedEmail = '';
		for ($i = 0; $i < strlen($email); $i++) {
			$obfuscatedEmail .= '&#' . ord($email[$i]) . ';';	
		}
				
		return $obfuscatedEmail;
	}
		
}