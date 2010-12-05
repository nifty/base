<?php

Class VarUtils {
	
	public static function nonEmptyArray($arr) {
		return is_array($arr) && !empty($arr);
	}
	
	public static function emptyArray($arr) {
		return !self::nonEmptyArray($arr);
	}
	
	public static function varDump($var) {
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}
	
	public static function printArray($arr) {
		echo '<pre>' . print_r($arr, true) . '</pre>';
	}
	
	public static function nonEmptyString($str) {
		$str = trim($str);
		
		return !empty($str);
	}
	
	public static function emptyString($str) {
		return !self::nonEmptyString($str);
	}
}