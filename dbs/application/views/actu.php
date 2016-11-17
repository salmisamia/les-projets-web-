<div class="page_content">
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
						<h1 class="cufonTitle" id="pageTitle" style="color:#000;"><?php the_title(); ?></h1>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
 
 <?php
	

$my_query = new WP_Query('category_name=3&posts_per_page=6');
$query_archives_news = new WP_Query('category_name=3');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					    <div class="actu-content">

						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singleactu/index/<?php echo $tit ?>">
							<div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
					
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>
</div>
<div style="clear:both;"></div>