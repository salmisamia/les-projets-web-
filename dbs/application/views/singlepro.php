
<div class="page_content">
		
<?php



	
$my_query = new WP_Query('category_name=promouser');

$query_archives_news = new WP_Query('category_name=promouser');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php if (get_the_title()== $tit) { ?>			
					    <div class="actu-contentb" style="height:450px;">

						
						<div class="img_produit"><?php the_post_thumbnail('thumbnailsbig') ?></div>
						<div class="article_content">
				
					    <?php 

					    the_content()?></div>
					    </div>
<?php } ?>

<?php endwhile;?>




</div>