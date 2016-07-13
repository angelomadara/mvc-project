<?php

/**
* 
*/
class Token
{
	public static function generateToken(){
		return Session::put(Config::get('session/token_name'),md5(uniqid()));
	}

	public static function checkToken($token){
		$tokenName = Config::get('session/token_name');

		if( Session::exist($tokenName) == true && $token === Session::get($tokenName) ){
			// Session::delete($tokenName);
			return true;
		}
		return false;
	}
}