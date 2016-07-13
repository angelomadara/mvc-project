<?php

use LoginModel as LoginModel;

class Login extends Controller
{	
	public function __construct(){
		// check if remember me is true
		Remember::check();

		// if session exist
		if(Session::isLogin()){
			Redirect::to('index');
		}
	}

	public function index(){
		return view('forms/login');
	}

	public function CheckCredentials(){
		$response = [];		
		$response['status'] = true;
		$response['title'] ='Register User';

		// if token is not valid
		if( !Token::checkToken(Request::get('_token')) ){
			$response["message"] = "<p class='alert alert-danger'>Invalid request</p>";
			$response['status'] = false;
			Session::flash('message','Login failed');
			return view('forms/login',$response);
		}

		$username = Request::get('username');
		$password = Request::get('password');

		if(Request::exist()){			
			$validate = new Validation();

			$validation = $validate->check($_POST,[
				'username' => ['name'=>'Username','required' => true],
				'password' => ['name'=>'Password','required' => true]
			]);

			if($validation->passed()){
				// remember me
				$remember = (Request::get('rememberme') === 'on') ? true : false;

				$checkThis = LoginModel::UserLogin([
					'username'=>$username,
					'password'=>$password
				]);

				if($checkThis){
					Session::put(Config::get('session/profile'),$checkThis->user_id);
					Redirect::to('index');
				}else{
					$response['message'] = "<p class='alert alert-warning'>Username or password didn't matched</p>";
					return view('forms/login',$response);
				}
			}else{
				$response['message'] = "<p class='alert alert-warning'>".$validation->error()."</p>";
				return view('forms/login',$response);
			}

		}

	}

}


