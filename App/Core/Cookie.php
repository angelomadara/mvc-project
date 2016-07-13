<?php 
/**
* 
*/
class Cookie
{
	public static function exist($name){
		return (isset($_COOKIE[$name])) ? true : false;
	}

	public static function get($name){
		if(self::exist($name)){
			return $_COOKIE[$name];
		}
		return false;
	}

	public static function put($data = []){
		if(
			array_key_exists('name', $data) && 
			array_key_exists('value', $data) &&
			array_key_exists('expiry', $data)
		){
			setcookie( $data['name'], $data['value'], time() + $data['expiry'], '/' );
		}
		return false;
	}

	public static function delete($name){
		return self::put([
			'name' => $name,
			'value' => '',
			'expiry' => time() - 1
		]);
	}

}