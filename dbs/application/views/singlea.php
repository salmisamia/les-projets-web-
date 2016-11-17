
<div class="page_content" style="height:450px;">
		

	<?php 
$my_query = new WP_Query('category_name=veh-par');

$query_archives_news = new WP_Query('category_name=veh-par');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $tit) { ?>
		
					   
					    <div class="actu-contentb">

						
						<div class="img_produit" style="float:left; margin-right:10px;">
                        <?php $t=get_the_title(); if(strtoupper($t)=='LATITUDE') echo'<iframe width="500" height="400" src="//www.youtube.com/embed/1oTBvuw4vJ0?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                         else {
                         	if(strtoupper($t)=='FLUENCE') echo'<iframe width="500" height="400" src="//www.youtube.com/embed/EGWFY2CHxTw?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                         	 else{echo '<iframe width="500" height="400" src="//www.youtube.com/embed/uabsdQqyDQg?autoplay=1" frameborder="0" allowfullscreen></iframe>';}} ?>
							 </div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); $name=get_the_title();  ?></h2>
					    <?php 

					    the_content()?><a class="devis" href="<?=base_url();?>devis/index/<?php the_title(); ?>">Demande de devis</a></div>
					    </div>

<?php } ?>
<?php  endwhile;?>
	<?php 
$my_query = new WP_Query('category_name=veh-uti');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $tit) { ?>
		
					   
					   <div class="actu-contentb" >

						
						<div class="img_produit" style="float:left; margin-right:10px;">
                        <?php $t=get_the_title(); if(strtoupper($t)=='LATITUDE') echo'<iframe width="500" height="400" src="//www.youtube.com/embed/EGWFY2CHxTw?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                         else {
                         	if(strtoupper($t)=='FLUENCE') echo'<iframe width="500" height="400" src="//www.youtube.com/embed/1oTBvuw4vJ0?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                         	 else{echo '<iframe width="500" height="400" src="//www.youtube.com/embed/uabsdQqyDQg?autoplay=1" frameborder="0" allowfullscreen></iframe>';}} ?>
							 </div>
						<div class="article_content">
						<h2 class="h3"><?php the_title(); ?></h2>
					    <?php 

					    the_content()?><a class="devis" href="<?=base_url();?>devis/index/<?php the_title(); ?>">Demande de devis</a></div>
					    </div>

<?php } ?>
<?php  endwhile;?>


</div>