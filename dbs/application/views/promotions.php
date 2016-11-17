<div class="listing_conteneur">
    <div class="cars">
        <div class="left">
            <img src="<?=base_url() ?>img/pub/promo-left-banner.png" alt="Des Promotions RACINAUTO à des prix allucinants !" />
        </div>
        <div class="right"> 
            <div class="results">
                <div class="carousel-wrapper">
                    <!--<ul class="cars_liste">
                    <? foreach ($promo_list as $index => $promo): ?>
                        <li <?php if ($index == 0) echo 'style="margin:0;"'; ?> >
                            <div class="card">
                                <a href="#" class="voir" title="<?=strtoupper($promo['vehicule_name'])?> en promo" >
                                    <div class="nom_vehicule">
                                        <h2 class="jaune cufonTitle">
                                            <?=strtoupper($promo['vehicule_name'])?>                        
                                        </h2>
                                        <h3>&nbsp;</h3>
                                    </div>
                                    <center>
                                        <img src="<?=base_url() . 'img/promo/' . strtoupper($promo['vehicule_code']) .'/promo-img.jpg' ?>" alt="<?=strtoupper($promo['vehicule_name'])?> "/>
                                    </center> 
                                    <div class="remise">
                                        <p class="gris">
                                            Remise de :<br> <span> <?=$promo['vehicule_promo']?>,00 DA</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    <? endforeach; ?>
                    </ul>-->
                    <?php
    
$my_query = new WP_Query(array('post_type' => array('page'),'pagename' => 'promotions'
));

$query_archives_news = new WP_Query('pagename=promotions');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        
                        <div class="actu-content">

                        <h4 class="title-actu"><?php the_title(); ?></h4>
                        <div class="article_content"><?php 

                        the_content()?></div>
                        </div>
</li>

<?php endwhile;?>
                </div>
            </div>

        </div>
    </div>
</div>