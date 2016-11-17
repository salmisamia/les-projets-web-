<div class="page_content">
</br>

<form method="post" action="">
<label style="font-weight:bold;">Filtrer par prix:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<label>Prix min: </label><input type="text" name="prix_min" style="height:25px;">&nbsp;&nbsp;&nbsp;&nbsp;
<label>Prix max: </label><input type="text" name="prix_max" style="height:25px;">
<a href="<?=base_url();?>compte\deconnexion" class="validate bouton boutonUnivers" style="margin-top:-5px; color:#fff; margin-left:20px;" id="btnVal"><input style="color:#fff;" type="submit" name="valider" value="Valider"></a>
</form>
<br/>
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2"></br></br>
						<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Véhicules utilitaires</h1><hr>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
			
 
 <?php
	
$my_query = new WP_Query('category_name=veh-uti&posts_per_page=6');

$query_archives_news = new WP_Query('category_name=veh-uti');
$num=0;

if (isset($prix_min))
{
while ($my_query->have_posts()) : $my_query->the_post(); ?>
	 <?php 
			$prix = get_post_meta(get_the_id(), 'prix', true); 
			
				if ($prix >= $prix_min && $prix < $prix_max)
			{ $num=1; ?>					
					    
					    <div class="actu-content">

						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea/index/<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 125).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    <h2><?php the_meta() ?></h2>

					    </div>
			<?php 
			} 
			endwhile;
		if($num!=1){echo '<br/><p style="font-weight:bold; font-size:15px; color:red;">Aucun résultat correspond à votre recherche!!</p>';} 
		} 
			else
			{ 
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
			

					<div class="actu-content" style="background-color: #eaeaea; width: 90%; height: 100%">

						<?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlea/index/<?php echo $tit ?>">
							<div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content" style="font-size:14px;font-family: arial; color: #305F70;">
						<h2><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 125).'...'; ?><span class="plus">Plus de détails</span></div></a></br>
					    <h2><?php the_meta() ?></h2></br></br>

					    </div>
			<?php
			endwhile;
			 }?>		    
</li>




</div>
<div style="clear:both;"></div>