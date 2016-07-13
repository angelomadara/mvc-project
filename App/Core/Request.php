<?php
	
/**
* POST, COOKIES
*/
class Request{

	public static function exist($type='post'){
		switch ($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
				break;
			
			case 'get':
				return (!empty($_GET)) ? true : false;
				break;
			
			default:
				return false;
				break;
		}
	}

	public static function Get($item,$isSanitize = true){
		if(isset($_POST[$item])){
			if($isSanitize == true){
				return self::Sanitize($_POST[$item]);
			}else{
				return $_POST[$item];
			}			
		}
		elseif(isset($_GET[$item])){
			if($isSanitize == true){
				return self::Sanitize($_GET[$item]);
			}else{
				return $_GET[$item];
			}	
		}		
		return null;
	}
	
	public static function response($key, $item){
		if($item){
			if(array_key_exists($key, $item)){
				return $item[$key];
			}
		}
		return false;
	}

	public static function key($key, $item){
		if($item){
			if(array_key_exists($key, $item)){
				return $item[$key];
			}
		}
		return false;
	}

	public static function Sanitize($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}