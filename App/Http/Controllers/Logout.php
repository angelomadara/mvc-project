<?php 
/**
* 
*/
class Logout extends Controller
{
	public function index(){
		Cookie::delete(Config::get("remember/cookie_name"));
		Session::delete(Config::get("session/profile"));
		Redirect::to('login');
	}
}