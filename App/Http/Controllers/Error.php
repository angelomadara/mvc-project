<?php

/**
* 
*/
class Error extends Controller
{
	public function index(){
		// return $this->MasterPage('error');
		return view("error",[
			'title' => '404 Error',
			'css' => ['error.css']
		]);
	}
}