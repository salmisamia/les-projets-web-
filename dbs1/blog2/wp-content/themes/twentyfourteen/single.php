<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="page_content">

<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
                         
						
						<h1 class="title_page" style="text-transform:uppercase;"><?php the_title(); ?></h1>
					</div>
				</article><!-- #post -->

			<?php endwhile; ?>

<div class="entry-content">
				<div class="left_bar"></div>
	<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

					
					<h4 class="title-actu"><?php the_title(); ?></h4>
					
					    <?php the_post_thumbnail('thumbnailsbig') ?>
    										<?php the_content()?>
               <?php endwhile;?>
</div>
</div>
<?php

get_footer();
