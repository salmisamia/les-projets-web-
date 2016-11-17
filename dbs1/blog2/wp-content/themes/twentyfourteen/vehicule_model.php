<?php 

/**
* Template Name: vehicule
*/
?>

<?php
	get_header();
?>
<div class="page_content">
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
						<h1 class="title_page"><?php the_title(); ?></h1>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
 
 <?php
	
$my_query = new WP_Query('category_name=vehicule&posts_per_page=6');

$query_archives_news = new WP_Query('category_name= vehicule');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					    <div class="actu-content">

						<a href="<?php the_permalink() ?>"><h4 class="title-actu"><?php the_title(); ?></h4>
						<div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
					    <div class="article_content"><?php 

					    the_content()?></div></a>
					    </div>
</li>

<?php endwhile;?>


</div>

<?php
	get_footer();
?>
 
