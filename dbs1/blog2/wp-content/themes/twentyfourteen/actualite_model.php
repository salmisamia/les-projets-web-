
<?php 

/**
* Template Name: Actualité
*/
?>
<?php
	
$my_query = new WP_Query('category_name=news&posts_per_page=3');

$query_archives_news = new WP_Query('category_name=news');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					    <div class="actu-content">

						<h4 class="title-actu"><?php the_title(); ?></h4>
					    <div class="article_content"><?php 

					    the_content()?></div>
					    </div>
</li>

<?php endwhile;?>



