<?php 

use User as User;

class Index extends Controller
{

	public function __construct(){
		if(!Session::isLogin()){
			Redirect::to('login');
		}
	}

	public function index(){

		$foundUser = User::Find(Session::get(Config::get('session/profile')));
		$name = ucwords(strtolower($foundUser->name));

		$x = User::raw();

		return view('testpage',[
			'title' => 'Welcome ' . $name,
			'user' => $name,
			'x' => $x
		]);
	}
}