
<!-- end header -->

<!--main content-->
<div id="body">

	 <?php 
   echo link_tag('css/default.css');
    
    echo link_tag('css/nivo-slider.css');
    echo link_tag('css/menu.css');


?>


 


<div class="page_content">
	</br>
<div style="width: 100%">
<div style="float: right; width: 27%;">
		<div id="form" style="background-color: #FAB700; padding: 10px;">
        <h3>Connectez-vous pour accéder à l'espace client.</h3>
         <div class="error">
         <?php 
          echo validation_errors(); ?>
          <?php if(isset($erreur)){echo '<p style="color:red">',$erreur,'</p>';}?>
          </div>
          <?php echo form_open('verifyloginc'); 
          ?>
               <label for="email">Email: </label>
               <input class="skinnedInput" style="width:200px;" type="text" size="20" id="email" name="email" class="itxt" /><br/>
               <label for="password">Mot de passe:</label>
               <input class="skinnedInput" style="width:200px;" type="password" size="20" id="passowrd" name="password" class="itxt" /><br/><br/>
               <!--<label>Je me connecte !</label><input type="submit" value="Connexion" class="submit" style="padding-left: 25px;"/>--><br/>
                <a href="#" class="validate bouton boutonUnivers" style="margin-top:-15px; margin-left: 60px; background-color: #dcdcdc;" id="btnVal">
                	<input type="submit" name="devis-submit" value="Connexion" style="color:#000; background-color: #dcdcdc;"></a>
               <p class="linkcontainer" ><a href="<?php echo base_url() ?>password">Mot de passe perdu ?</a>&nbsp;&nbsp;<a href="<?php echo base_url() ?>inscription">S'inscrire</a></p>
        </form>
   
</div>
</br>
<div style="background-color: #fab700; padding: 10px;font-family: arial;
    font-size: 20px; height: 150px; ">
<div id="form" >
<span style="text-align: center;">autobip.com </div>
 
 <span id="titleNav"> &nbsp; &nbsp; &nbsp; &nbsp;Guide d'achat </br>Comparateur de prix </br>&nbsp; &nbsp; &nbsp; &nbsp;en Algerie </br>
 	<div style="margin-left: 60px;">
 <a href="http://www.autobip.com/comparateur-voitures-algerie" target="blink">
 	<input style="background-color: #dcdcdc; color: #000" type="submit" value="COMPARER"></a></span></br>
 </div>
 

	</div>
	</div></div>


<div style="float: left; width: 70%;">

<div id="wrapper" style="background-color: red; height: 300px;">
<div class="slider-wrapper theme-default" style=" height: 300px; ">
<div id="slider" class="nivoSlider"  style="height: 300px;" >
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/blan.jpg" alt="" />
                          <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_1_r2_c1.jpg" alt="" data-transition="slideInLeft" />
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/noir.jpg" alt="" title="" /></a>
      
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_4_r2_c1.jpg" style="height: 300px; width: 300px;" alt="" title="#htmlcaption" />
</div>
</div>

</div>



<div  style="float: right; height: 300px;"> </br>
	 <span style=" font-size: 15px; color: #0293C5; font-family: arial"><strong>REMISES SPÉCIAL SALON POUR RENAULT</strong> </span><hr>
	</br>

<?php
$my_query = new WP_Query('category_name=promouser&posts_per_page=6');
$query_archives_news = new WP_Query('category_name=promouser');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
					

					     <div class="actu-content" style="width:188px; border:solid 1px #ccc;height:150px; padding:5px; margin-right: 25px; float: right;">
					     <?php $tit=get_the_title(); ?>
						<a href="<?=base_url();?>singlepro\index\<?php echo $tit ?>">
							<div class="img_produit" style="margin-left: 5px;"><?php the_post_thumbnail('thumbnailssmall') ?></div>
						<div class="article_content" style="width:185px;">
					     <?php echo substr(get_the_content(), 0, 45).'...'; ?>
					     <span class="plus" style="margin-right:20px;">Plus de détails</span></div></a>
					    </div>
<?php endwhile;?>



</div>


<div  style="float: right; height: 300px;"> </br>
	 <span style=" font-size: 19px; color: #0293C5; font-family: arial"><strong>Nouveautèes</strong> </span><hr>
	</br>
<a href="http://localhost/dbs/singleactu/index/Captur"><img style="width: 190px; height: 100px;" src="<?php echo base_url() ; ?>img/logo/captur-672x372.jpg" alt="Logo Renault"></a>
<a href="http://localhost/dbs/singleactu/index/Clio"><img style="width: 150px;" src="<?php echo base_url() ; ?>img/logo/clio.jpg" alt="Logo Renault"></a>

<a href="http://localhost/dbs/singleactu/index/FAW"><img style="width: 150px; height: 100px;" src="<?php echo base_url() ; ?>img/logo/duster.jpg" alt="Logo Renault"></a>
<a href="http://localhost/dbs/singleactu/index/Commercialisation"><img style="width: 150px; height: 100px;" src="<?php echo base_url() ; ?>img/logo/yarisberlin.jpg" alt="Logo Renault"></a>


	



</div>






		</div>	</div></div></div>

<!-- JavaScript -->

<!-- visuels modelpickers -->
<script type="text/javascript">
var ConfigMenuMP  = {
	
		
			'id_548' : {
				
					'id_1719' : '<?=base_url();?>img/models/TW2/rangepage-off.png'
		    	
			},
		
			'id_579' : {
				
					'id_1748' : '<?=base_url();?>img/models/CT5/rangepage-off.png'
		    	
			},
		
			'id_549' : {
				
					'id_1721' : '<?=base_url();?>img/models/CL24/rangepage-off.png',
		    	
					'id_1722' : '<?=base_url();?>img/models/CL4/rangepage-off.png',
		    	
					'id_1780' : '<?=base_url();?>img/models/CL3_PH2_RS/rangepage-off.png'
		    	
			},
		
			'id_569' : {
				
					'id_1724' : '<?=base_url();?>img/models/KP2/rangepage-off.png'
		    	
			},
		
			'id_570' : {
				
					'id_1727' : '<?=base_url();?>img/models/M3B/rangepage-off.png',
		    	
					'id_1728' : '<?=base_url();?>img/models/M3D/rangepage-off.png',
		    	
					'id_1730' : '<?=base_url();?>img/models/M3E/rangepage-off.png',
		    	
					'id_1779' : '<?=base_url();?>img/models/M3D_RS/rangepage-off.png'
		    	
			},
		
			'id_571' : {
				
					'id_1733' : '<?=base_url();?>img/models/S3C/rangepage-off.png'
		    	
			},
		
			'id_572' : {
				
					'id_1734' : '<?=base_url();?>img/models/FLU/rangepage-off.png'
		    	
			},
		
			'id_573' : {
				
					'id_2219' : '<?=base_url();?>img/models/KOL2/rangepage-off.png'
		    	
			},
		
			'id_574' : {
				
					'id_1741' : '<?=base_url();?>img/models/LC3/rangepage-off.png'
		    	
			},
		
			'id_575' : {
				
					'id_1743' : '<?=base_url();?>img/models/L43/rangepage-off.png'
		    	
			},
		
			'id_577' : {
				
					'id_1745' : '<?=base_url();?>img/models/TFP/rangepage-off.png'
		    	
			},
		
	
		
			'id_580' : {
				
					'id_1749' : '<?=base_url();?>img/models/KU2/rangepage-off.png'
		    	
			},
		
			'id_588' : {
				
					'id_1759' : '<?=base_url();?>img/models/TFU/rangepage-off.png'
		    	
			},
		
			'id_581' : {
				
					'id_1760' : '<?=base_url();?>img/models/X62/rangepage-off.png'
		    	
			},
            'id_593' : {
                    'id_1871' : '<?=base_url();?>img/models/52L/rangepage-off.png'
            },
            'id_590' : {
                    'id_1870' : '<?=base_url();?>img/models/90k2/rangepage-off.png'
            },
            'id_591' : {
                    'id_1880' : '<?=base_url();?>img/models/52B/rangepage-off.png'
            },
            'id_592' : {
                    'id_1890' : '<?=base_url();?>img/models/79H/rangepage-off.png'
            }
		
	
}
</script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
