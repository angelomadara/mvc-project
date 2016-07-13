<?php

/**
*
*/
class Session{
	
	public static function put($name,$value){
		return $_SESSION[$name] = $value;
	}

	public static function exist($name){
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function delete($name){
		if(self::exist($name)){
			unset($_SESSION[$name]);
		}
	}

	public static function get($name){
		if( self::exist($name) ){
			return $_SESSION[$name];
		}
		return false;
	}

	public static function isLogin(){
		$session_name = Config::get('session/profile');
		if(self::exist($session_name)){
			return true;
		}
		return false;
	}

	public static function flash($name, $string = ''){
		if(self::exist($name)){
			$session = self::get($name);
			self::delete($name);
			return $session;
		}else{
			self::put($name, $string);
		}
	}
}
