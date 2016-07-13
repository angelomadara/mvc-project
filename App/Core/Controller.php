<?php

/**
*	function listed
*	> model settings
*	> view settings
*/

class Controller
{

	// creating new instance of a model class
	public function Model($model){
		require_once 'App/Http/Models/'.$model.'.php';
		return new $model();
	}

}
