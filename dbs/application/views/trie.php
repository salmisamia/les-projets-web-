

<div class="page_content">

<?php if ($couleur != '') {
	echo'<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Triés par couleur</h1>';?>



<h2>Véhicules utilitaires</h2>
<?php
	
$my_query = new WP_Query('category_name=veh-uti&posts_per_page=6&meta_key=color&oderby=meta_value_num title&order=ASC');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					 	
					<div class="actu-content">
                         <?php $m=get_post_meta( get_the_ID(), 'color', false); $p=get_post_meta( get_the_ID(), 'prix', false); ?>
						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>
<h2>Véhicules particuliers</h2>
<?php
	
$my_query = new WP_Query('category_name=veh-par&posts_per_page=6&meta_key=color&oderby=meta_value_num title&order=ASC');

$query_archives_news = new WP_Query('category_name=veh-par');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="actu-content">
                         <?php $m=get_post_meta( get_the_ID(), 'color', false); $p=get_post_meta( get_the_ID(), 'prix', false); ?>
						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>
<?php } else {echo '<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Triés par prix</h1>';?>

<h2>Véhicule utilitaires</h2>
<?php
	
$my_query = new WP_Query('category_name=veh-uti&posts_per_page=6&meta_key=prix&oderby=meta_value_num&order=ASC');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					 	
					<div class="actu-content">
                         <?php $m=get_post_meta( get_the_ID(), 'color', false); $p=get_post_meta( get_the_ID(), 'prix', false); ?>
						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>
<h2>Véhicule particuliers</h2>
<?php
	
$my_query = new WP_Query('category_name=veh-par&posts_per_page=6&meta_key=prix&oderby=meta_value_num&order=ASC');

$query_archives_news = new WP_Query('category_name=veh-par');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="actu-content">
                         <?php $m=get_post_meta( get_the_ID(), 'color', false); $p=get_post_meta( get_the_ID(), 'prix', false); ?>
						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>
 <?php }?>
</div>
<div style="clear:both;"></div>

			
