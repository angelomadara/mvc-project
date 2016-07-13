<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en">        <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en">               <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en">                           <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="keyword" content="">
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<title><?= Request::response('title',$_COUT) ?></title>
	  	<link rel='stylesheet' href='<?=CSS_ADDR?>/bootstrap.min.css' type='text/css'>
		<!-- styles -->
<?php if( Request::response('css',$_COUT) ):?>
<?php foreach(Request::response('css',$_COUT) as $key => $value): ?>
		<link rel='stylesheet' href='<?=CSS_ADDR.'/'.$value?>' type='text/css'>
<?php endforeach; ?>
<?php endif; ?>
	</head>
	<body>
	<?="\n" ?>

    	<?=isset($cout['output']) ? $cout['output'] : false; ?>

		<?="\n\n" ?>
		<!-- jQuery -->
		<script src="<?=JS_ADDR?>/jquery-1.10.2.js"></script>
		<script src="<?=JS_ADDR?>/bootstrap.min.js"></script>
		<!-- my scripts -->
<?php if( Request::response('js',$_COUT) ): ?>
<?php foreach(Request::response('js',$_COUT) as $key => $value): ?>
		<script src="<?=JS_ADDR.'/'.$value?>"></script>
<?php endforeach; ?>
<?php endif; ?>
	</body>
</html>
