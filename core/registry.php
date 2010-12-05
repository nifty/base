<?php

class Registry {
	private static $_vars = array();
	
	public static function set($key, $val) {
		self::setVarByDotString($key, $val);
	}
	
	private static function setVarByDotString($str, $val) {
		$parts = explode('.', $str);
		$numParts = count($parts) - 1;
				
		$location = &self::$_vars;
			
		foreach ($parts as $i => $part) {			
			if ($i < $numParts) {
				if (!is_array($location[$part])) {
					$location[ $part ] = array();
				}
				
				$location = &$location[ $part ];
			} else {
				$location[$part] = $val;
			}
		}
	}
	
	public static function get($key) {
		$var = self::getVarByDotString($key);
		
		if (!empty($var)) {
			return $var; 
		}
		
		return false;
	}
	
	public static function has($key) {
		$var = self::getVarByDotString($key);
		
		return isset($var) && !empty($var);
	}
	
	private static function &getVarByDotString($str) {
		$parts = explode('.', $str);
		
		$location = self::$_vars;
		foreach ($parts as $part) {
			$location = $location[$part];
		}
		
		return $location;
	}
	
	public static function poo($return = false) {
		if (!$return) {
			echo '<pre>' . print_r(self::$_vars, true) . '</pre>';
		} else {
			return self::$_vars;
		}
	}
}
