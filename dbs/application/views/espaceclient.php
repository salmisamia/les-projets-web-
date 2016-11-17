<div class="page_content">
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
						<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Véhicules Particuliers</h1>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
 <p>L'etat de votre commande </p>
<!-- <?php
	
$my_query = new WP_Query('category_name=promouser&posts_per_page=6');

$query_archives_news = new WP_Query('category_name=promouser');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
					     <div class="actu-content">

						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlepro\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
					
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>


<?php endwhile;?>-->
<br/>
                <a href="<?=base_url();?>compte\deconnexion" class="validate bouton boutonUnivers" style="margin-top:-15px; float:right;margin-right:160px;" id="btnVal"><input type="submit" name="devis-submit" value="Deconnexion" style="color:#fff"></a>
</div>
<div style="clear:both;"></div>
			
