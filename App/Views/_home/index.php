		<ul>
	<?php foreach($cout['output'] as $key): ?>
		<li><a href='<?=DOMAIN_NAME."/".$key?>'><?=STRTOUPPER($key)?></a></li>
	<?php endforeach; ?>
	</ul>