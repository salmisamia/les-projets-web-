<div class="page_content">
<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Véhicules Utilitaires</h1>
<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
						<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Véhicules Utilitaires</h1>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
 
 <?php
	
$my_query = new WP_Query('category_name=veh-uti&posts_per_page=6');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					    <div class="actu-content">

						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
</li>

<?php endwhile;?>


</div>
<div style="clear:both;"></div>