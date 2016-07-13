<?php 
/**
* 
*/
class Profile extends Controller
{
	public function index(){
		return view('home/index',[
			'page_title' => 'Homepage',
			'user' => 'profile'
		]);
	}
}