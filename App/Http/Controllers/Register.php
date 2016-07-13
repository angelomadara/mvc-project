<?php

use User as USER;

class Register extends Controller
{
	public function index(){
		return view('forms/register',[
			'title' => 'Register User',
		]);
	}

	public function checkinformation(){
		$response = [];
		$response['status'] = true;
		$response['title'] ='Register User';		
		$response['user'] = Request::get('username');
		$response['name'] = Request::get('user-name');

		// if token is not valid
		if( !Token::checkToken(Request::get('_token')) ){
			$response["message"] = "<p class='alert alert-danger'>Request failed.</p>";
			$response['status'] = false;
			return view('forms/register',$response);
		}

		if(Request::exist()){
			$validate = new Validation();

			$validation = $validate->check($_POST,[
				'username' => [
					'name' 		=> 'Username',
					'required' 	=> true,
					'min' 		=> 6,
					'unique' 	=> 'user'
				],
				'password1' => [
					'name' 		=> 'Password',
					'required' 	=> true,
					'min'		=> 8
				],
				'password2' => [
					'name' 		=> 'Password',
					'required' 	=> true,
					'min'		=> 8,
					'matches' 	=> 'password1'
				],
				'user-name' => [
					'name' 		=> 'Name',
					'required' 	=> true,
				]
			]);
 
			if($validation->passed()){
				$return = USER::create([
					'username' 		=> Request::get('username'),
					'password' 		=> Hash::make(Request::get('password1'),$salt),
					'salt' 			=> Hash::salt(32),
					'date_joined' 	=> date('Y-m-d H:i:s'),
					'user_group' 	=> 1,
					'name' 			=> Request::get('user-name')
				]);

				$response['message'] = "<p class='alert alert-success'>Registration successful</p>";
				// return view('greetings/registration',$response);
				Session::flash('registration','You have been registered successfully');
				// header("Location:".DOMAIN_NAME.'/greetings/registration');
				Redirect::to('greetings/registration');
			}else{
				$response['message'] = "<p class='alert alert-warning'>".$validation->error()."</p>";
				return view('forms/register',$response);
			}
		}

	}

	public function RegistrationSuccessful(){
		echo 'slfkjsdfkl';
	}


}