<p class="response-msg"></p>
<form action="register/test" method="POST" id='form-registration'>
	<input type="hidden" name="_token" value="<?=Token::generateToken()?>">
	<input type="text" name="username" autocomplete='off'>
	<input type='password' name="password" autocomplete='off'>
	<input type='password' name="password2" autocomplete='off'>
	<input type='submit' value="Save" id='register-button'>
</form>

<?php

$rule = [
	'username'	=>"name:Username|required:true|min:2|max:10|unique:users",
	'sdf'		=>'asdfs'
	];


// $rules = explode('|', $rule['username']);

$rebuilt_rule = "";
$xx = [];

foreach ($rule as $key => $rule_value) {
	$rebuilt_rule[$key] = $rule_value;
}

// foreach($rebuilt_rule[] as $rules_key => $e){
// 	$xx[$rules_key] = explode(':', $e);
// }

echo "<pre>";
echo json_encode($rebuilt_rule,JSON_PRETTY_PRINT);
echo "</pre>";



echo "<pre>";
echo json_encode([
			'username' => [
				'name' 		=> 'Username', // name to appear in validation
				'required' 	=> true,
				'min'		=> 2,
				'max'		=> 20,
				'unique'	=> 'users' // unique compare value of this item to the unique value represents the table name
			],
			'password' => [
				'name' 		=> 'Password',
				'required' 	=> true,
				'min'		=> 6,
			],
			'password2' => [
				'name'		=> 'Password',
				'required' 	=> true,
				'matches'	=> 'password'
			]
		],JSON_PRETTY_PRINT);
echo "</pre>";


