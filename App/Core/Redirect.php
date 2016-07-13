<?php 
/**
* 
*/
class Redirect
{
	public static function to($location = null){
		if($location){
			header("Location: ".DOMAIN_NAME.'/'.$location);
			exit();
		}
	}
}