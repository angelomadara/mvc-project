		<div class="container">
			<div class="row">
				<form action="<?=DOMAIN_NAME?>/sql" method='POST' class='col-lg-9'>
				    <textarea name="sentence" id="" class="form-control" placeholder='query...' style='max-height:315px;min-height:315px;max-width:100%;'></textarea>
				    <input type="submit" value="Query" class='btn btn-default'>
				</form>
				<div class='col-lg-3' style='overflow-y:scroll;max-height:315px;min-height:315px;'>
				    <!-- <pre><?= json_decode($cout['output']['databases']) ?></pre> -->

				    	<?php foreach(json_decode($cout['output']['databases']) as $key => $value): ?>
				    		<a href="#"><?= $value->Tables_in_ampc ?></a>
				    	<?php endforeach; ?>
				</div>
			</div>
		</div>
		
	
		<pre><?= $cout['output']['count'] ?></pre>
		<pre>SENTENCE : <?= $cout['output']['sentence'] ?></pre>
		<pre>			
			<div><?= $cout['output']['result'] ?></div>
		</pre>