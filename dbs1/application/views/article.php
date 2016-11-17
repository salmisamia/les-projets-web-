 <?php
	
$my_query = new WP_Query('category_name=vehicule&posts_per_page=6');

$query_archives_news = new WP_Query('category_name= vehicule');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					    <div class="actu-content">

						<h4 class="title-actu"><?php the_title(); ?></h4>
						<div class="img_produit"><?php the_post_thumbnail('thumbnails') ?></div>
					    <div class="article_content"><?php 

					    the_content()?></div>
					    </div>
</li>

<?php endwhile;?>

 <a href="<?php echo bloginfo('siteurl') ?>/vehicules">Véhicules</a>