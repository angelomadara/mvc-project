
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project-x</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="profile">Profile</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<?=Request::response('user',$_COUT)?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li><a href="<?=DOMAIN_NAME?>/logout">Logout</a></li>
						</ul>
					</li>
				</ul>

			</div>

		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<pre>
				<?php 
					print_r(Request::key('x',$_COUT));
				?>
				</pre>
			</div>
		</div>
	</div>