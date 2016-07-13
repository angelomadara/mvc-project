<?php 
/**
* 
*/
class Greetings extends Controller
{
	public function index(){
		return view("error",[
			'title' => '404 Error',
			'css' => ['error.css']
		]);
	}

	public function registration(){
		return view('greetings/registration');
	}
}