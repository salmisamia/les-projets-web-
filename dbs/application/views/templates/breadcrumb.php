<div class="breadcrumb">
	<ul>
		<li class="first"><a href="<?php echo base_url(); ?>">Accueil</a></li>
		<?php
			foreach ($entry as $e): ?>
				<li <? if (isset($e['isLast'])): ?> class="current" <?endif?>><a href="<?=$e['url']?>" ><? echo $e['page_name'];?></a></li>
		<?php endforeach; ?>
	</ul>
</div>