	<? if ($is_archive) { ?>
		<h2>ARCHIVES </h2>
	<? } 
		else
			{ ?>
		<h2>NEWS PUBLIEES </h2>
	<? }
	?>	
	<br/>
<?php
	foreach ($newslist as $news) {
	?>
		<div class="news-entry">
			<div class="actions-block">
				<a href="<?=site_url();?>/admin/news/update/<?=$news['id']?>"> Modifier</a> &nbsp; | &nbsp;
				<? if ($is_archive) { ?>
					<a href="<?=site_url();?>/admin/news/publish/<?=$news['id']?>"> Publier </a>
				<? } else { ?>
				<a href="<?=site_url();?>/admin/news/archive/<?=$news['id']?>"> Archiver</a>
				<? } ?>
			</div>	
			<h2><?=$news['title']?></h2>
		</div>
	<?php	
	}
?>