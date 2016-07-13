<?php 
	// print_r(Cookie::get('hash'))
	// echo Session::get('PHPSESSID');
?>

<div class="container">
	<div class="row">
		<div class="col-lg-3">


			<form action="<?= DOMAIN_NAME ?>/login/check-credentials" method="POST">
				<h1>Login</h1>
				<?= Request::response('message',$_COUT) ?>
				<div>
					<p>Username</p>
					<input type="text" name="username" class='form-control'>
				</div>
				<div>
					<p>Password</p>
					<input type="password" name="password" class='form-control'>
				</div>
				<div>
					<p><input type="checkbox" name="rememberme"> Remember me </p>
				</div>
				<hr>
				<input type="hidden" name="_token" value='<?=Token::generateToken()?>'>
				<input type="submit" name="submit-button" value="Login" class='btn btn-default'>
			</form>

		</div>
	</div>
</div>
