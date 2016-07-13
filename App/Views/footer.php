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
