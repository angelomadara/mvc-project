<?php

/**
*
*/
class Route
{
	// if $url[0] not exist call this varialbe
	protected $controller = 'Index';
	// if $url[1] not exist call this varialbe
	protected $method = 'index';
	// if $url[2,.,.,.,.,.,] not exist call this varialbe
	protected $params = [];

	protected $error = 'Error';

	public function __construct(){

		$url = $this->parseURL();
		// echo "<pre>";
		// print_r($url);
		// echo "</pre>"; exit();

		if(isset($url[0])){

			if(file_exists('App/Http/Controllers/' . str_replace('-', '', $url[0]) . '.php')){
				// send the value of first value of array to the controller variable
				$this->controller = str_replace('-', '', $url[0]);
				// unset the first data into the array
				unset($url[0]);
			}
			else{
				// require "App/Http/Controllers/Error.php";
				// $controller = new Error();
				// return false;
				$this->controller = $this->error;
			}

		}else{

			// if url[0] is not found load the default controller which is HOME
			$this->controller = $this->controller;

		}

		// call the controller
		require_once 'App/Http/Controllers/'.$this->controller.'.php';
		// echo 'App/Http/Controllers/'.$this->controller.'.php';
		// exit();
		// create new instance for the controller
		$this->controller = new $this->controller;

		//
		// check if the second value of array exist
		//
		if(isset($url[1])){
			// check if the method in the controller exist

			$method_name = str_replace('-', ' ', strtolower($url[1])); // remove dashes and convert to spaces
			$method_name = str_replace(' ', '', ucwords($method_name)); // convert to pascal case then remove spaces

			if( method_exists( $this->controller, $method_name ) ){
				$this->method = $method_name;
				unset($url[1]);
			}
		}

		//
		// set parameters to the left over array values of $url otherwise if void set it to an empty array
		//
		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	// get the url
	public function parseURL(){
		if(isset($_GET['url'])){
			return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}
