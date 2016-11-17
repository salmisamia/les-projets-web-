
<div class="page_content">
		

	<?php 
$my_query = new WP_Query('category_name=veh-par');

$query_archives_news = new WP_Query('category_name=veh-par');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $tit) { ?>
		
					   
					    <div class="actu-contentb">

						
						<div class="img_produit"><?php the_post_thumbnail('thumbnailsbig') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php 

					    the_content()?><a class="devis" href="<?=base_url();?>devis/">Demande de devis</a></div>
					    </div>

<?php } ?>
<?php  endwhile;?>
	<?php 
$my_query = new WP_Query('category_name=veh-uti');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $tit) { ?>
		
					   
					    <div class="actu-contentb">

						
						<div class="img_produit"><?php the_post_thumbnail('thumbnailsbig') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php 

					    the_content()?><a class="devis" href="<?=base_url();?>devis/">Demande de devis</a></div>
					    </div>

<?php } ?>
<?php  endwhile;?>


</div>