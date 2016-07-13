<?php

/**
* 
*/
class Validation
{
	private $_passed = false,
			$_errors = [],
			$_db = null;

	public function __construct(){

		$this->_db = DB::ready();

	}

	public function check($source, $items=[]){

		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {

				// echo "{$item} : {$rule} = {$rule_value}<br>";
				// $value = $source[$rule];
				$value = trim($source[$item]);
				$item = Clean($item);
				// echo $value."<br>";
				if($rule === 'required' && empty($value)){

					// for debugging
					// $this->addError("{$item} is required");

					// for deployment
					$this->addError("{$rules['name']} is required. ");

				}
				elseif(!empty($value)){
					switch ($rule) {
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$rules['name']} must be {$rule_value} character(s) long. ");
							}
							break;
						
						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$rules['name']} only has a maximum characters of {$rule_value}. ");
							}
							break;
						
						case 'unique':
							$check = $this->_db->get($rule_value,[$item,"=",$value]);
							if($check->count()){
								// for debugging
								// $this->addError("{$item} already exist. ");
								// for deployment
								$this->addError("{$rules['name']} already taken. ");
							}
							break;
						
						case 'matches':
							if($value != $source[$rule_value]){
								// for debugging
								// $this->addError("$rule_value must match {$item}");
								// for deployment
								$this->addError("{$rules['name']} didn't matched. ");
							}
							break;

						default:
							# code...
							break;
					}
				}

			}
		}

		if(empty($this->_errors)){
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error){
		$this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors; // show all errors
	}

	public function error(){
		return $this->_errors[0]; // show only the first error from the array
	}

	public function passed(){
		return $this->_passed;
	}

}