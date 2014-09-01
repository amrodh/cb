	<?php $count = 0; ?>
	<?php foreach ($districts as $item): ?>
	<li rel="<?=$count ?>">
		<a tabindex="<?=$count ?>">	
			<span class="text"><?= $item['name'] ?></span>
			<!-- <i class="glyphicon glyphicon-ok icon-ok check-mark"></i> -->
		</a>
	</li>
	<?php $count++ ?>
	<?php endforeach ?>
