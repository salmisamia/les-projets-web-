<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php get_header(); ?>
<div class="page_content">
<div class="page_content_left">
<div class="lien-top"><img src="<?php echo get_bloginfo('template_directory') ?>/images/home-icon.png"><span class="home">Vous êtes ici:</span>
<a href="<?php bloginfo('url'); ?>" class="first"></a>
	<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
</div>
<?php $num=0; if ( have_posts() ) : ?>
<?php $num = $wp_query->post_count; ?>
<h1 class="title_page" style="margin-top:30px;">RECHERCHE</h1>
			
	<div class="entry-content">
		  <div class="left_bar"></div>
			<div class="search_design">
			<div class="searchf"><?php get_search_form(); ?></div>
<h1 style="margin-top:10px;font-size:16px;margin-bottom:5px;color:#000;"><?php printf( __( 'Les résultats de recherche pour: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
<h1 style="margin-top:10px;font-size:16px;margin-bottom:5px;color:#000;"><?php echo "Nombre de résultats: ". $num ;?></h1>
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
					if ($post->post_type == 'post'){ ?>
					<!--<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Affiché dans:', 'twentyfourteen' ); ?></span><?php echo get_the_category_list(', '); ?></span>-->
						<h4 class="entry-tit"><img src="<?php echo get_bloginfo('template_directory') ?>/images/loupe.png"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'twentyfourteen'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

                    <!--<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnails')?></a>
                   <p class="excerptr"> <?php echo substr(get_the_excerpt(),0, 200); ?>...</p>
                   <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'twentyfourteen' ) . '&after=</div>') ?>-->
					<!-- .entry-summary -->
 <?php  } ?>
			
 
<?php 
					endwhile;?>
					
				

<?php	else : ?>
<h1 class="title_page" style="margin-top:30px;font-size:20px;margin-bottom:45px;">RECHERCHE</h1>
	<div class="entry-content">
			<div class="left_bar"></div>
			<div class="search_design">
				<div class="searchf"><?php get_search_form(); ?></div>
	            <p style="margin-left:0px; padding-top:5px;"><?php _e( 'Aucun résultat correspond a votre recherche !!!!', 'twentyfourteen' ); ?></p>		
<?php endif; ?>				
			</div>
    </div>						
						
				
          
	

</div>
<?php get_sidebar();?>
</div>
</div>

<?php get_footer();