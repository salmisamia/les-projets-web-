

<div class="page_content">
	<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Resultats de recherche</h1>
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					</header><!-- .entry-header -->
                   <div class="title_class2">
						<h1 class="cufonTitle" id="pageTitle" style="color:#000;">Resultats de recherche</h1>
					</div>
				</article><!-- #post -->


			<?php endwhile; ?>
 
 <?php
$num=0; $m = array(); $p = array();
$my_query = new WP_Query(array( 'category__in' => array( 4, 5 ) )  );

//$query_archives_news = new WP_Query('category_name=20,8');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php 
				 $tit=get_the_title(); 
					$m = get_post_meta( get_the_ID(), 'color', false);  
					$p = get_post_meta( get_the_ID(), 'prix', false);
					    if ( (strtoupper($tit)==strtoupper($form_data)) || ($m[0] == $form_data) || ($p[0] == $form_data)) 
					    	{ $num++;
					    ?>
					<div class="actu-content">
                         <?php $m=get_post_meta( get_the_ID(), 'color', false); $p=get_post_meta( get_the_ID(), 'prix', false); ?>
						
						<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>"><div class="img_produit"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php echo substr(get_the_content(), 0, 400).'...'; ?><span class="plus">Plus de détails</span></div></a>
					    </div>
					
				


<?php } endwhile;?>

<?php /*$my_query = new WP_Query('category_name=8');

$query_archives_news = new WP_Query('category_name=8');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php 
					$tit=get_the_title(); 
					$ma=get_post_meta( get_the_ID(), 'color', false);  
					$pa=get_post_meta( get_the_ID(), 'prix', false);    ?>
                   <?php //echo $ma[0];?>

					    <?php if (strtoupper($tit)==strtoupper($form_data) || $ma[0] == $form_data || $pa[0] == $form_data) { $num++;?>
					<a href="<?=base_url();?>singlea\index\<?php echo $tit ?>">- <?php echo strtolower($tit);} ?></a>
				


<?php endwhile;*/?>
	 <?php if($num == 0){  ?>  <p>Aucun resultat correspond à votre recherche !!!</p><?php } else { echo "<br/>Nombre de résultats:".$num;} ?>

</div>
<div style="clear:both;"></div>

			
