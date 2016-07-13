<?php

/**
* 
*/
class Config{
	public static function get($path = null){
		if($path){
			$config = $GLOBALS['config'];
			$path = explode('/', $path);
			// print_r($path);
			foreach ($path as $key => $bit) {
				// if(isset($config[$bit]))
				isset($config[$bit]) ? $config = $config[$bit] : null;
			}
			return $config;
		}
		return false;
	}
}