<div class="container">
	<div class="row">
		<div class="col-lg-5">


			<form action="<?= DOMAIN_NAME ?>/register/check-information" method="post" autocomplete='off'>
				<h1>Register</h1>

				<?=Request::response('message',$_COUT)?>

				<div>
					<p>Desired Username</p>
					<input type="text" name="username" value='<?=Request::response("user",$_COUT)?>' class='form-control'>
				</div>

				<div>
					<p>Desired password</p>
					<input type="password" name="password1" class='form-control'>
				</div>

				<div>
					<p>Enter your desired password again</p>
					<input type="password" name="password2" class='form-control'>
				</div>

				<div>
					<p>Your name</p>
					<input type="text" name="user-name" value='<?=Request::response("name",$_COUT)?>' class='form-control'>
				</div>

				<input type="hidden" name="_token" value="<?=Token::generateToken()?>" class='form-control'>
				<hr>
				<input type="submit" value="Register" class="btn btn-primary">

			</form>
		</div>
	</div>
</div>