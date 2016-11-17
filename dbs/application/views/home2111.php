</div>
<!-- end header -->

<!--main content-->
<div id="body">
	 <?php 
  echo link_tag('css/default.css');
echo link_tag('css/nivo-slider.css');
    echo link_tag('css/menu.css'); ?>

    <div id="main">
        <div id="mainInside">
<div id="homepageContent" class="blockHomepage withRightCol bMargin" style="height:px;">

<div class="homepageMedia">
</br></br>
			<div style="float: right;"><tbody>
<tr>
<td><select >
  <option>Selectionnez un vehicule</option>
  <option>Latitude</option>
  <option>Fluence</option>
  <option>Scenic</option>
  <option>Kango</option>
  <option>Clio</option>  
  <option>Symbol</option>
</select>
</td>
<td><select><option>Choisir le couleur</option>
<option>Marron</option>
<option>Noir</option>
<option>Blan</option>


</select></td>
<td><select><option>Selectioner un Prix</option>
<option>1076000</option>
<option>1386000</option>
<option>1762000</option></select></td>

<td><tr><input type="submit" value="rechercher"></tr></td>

</tr>
</tbody>
</table></div>	</br>
					
     <div id="blockFlashHome" style="float:right; box-shadow: 0 0 3px #000000; border: 20px"> 
  <div id="slider" class="nivoSlider"  style="" >
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_1_r2_c1.jpg" alt="" />
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_2_r2_c1.jpg" alt="" title="" /></a>
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_3_r2_c1.jpg"  alt="" data-transition="slideInLeft" />
                <img src="<?=base_url();?>img/decouvrez-racinauto/presentation/IMG_4_r2_c1.jpg" alt="" title="#htmlcaption" />
</div>
</div>


</div>

<div class="homepageRight" style="margin-top:-10px;height:450px;">
</br></br></br>
	<div id="form" style="background-color: #D9D9D9">
        <h3>Connectez-vous pour accéder à l'espace client.</h3>
         <div class="error">
         <?php 
          echo validation_errors(); ?>
          <?php if(isset($erreur)){echo '<p style="color:red">',$erreur,'</p>';}?>
          </div><br/>
          <?php echo form_open('verifyloginc'); 
          ?>
               <label for="email">Email: </label>
               <input class="skinnedInput" style="width:200px;" type="text" size="20" id="email" name="email" class="itxt" /><br/>
               <label for="password">Mot de passe:</label>
               <input class="skinnedInput" style="width:200px;" type="password" size="20" id="passowrd" name="password" class="itxt" /><br/><br/>
               <!--<label>Je me connecte !</label><input type="submit" value="Connexion" class="submit" style="margin-right:42px;"/>--><br/>
                <a href="#" class="validate bouton boutonUnivers" style="margin-top:-15px;" id="btnVal"><input type="submit" name="devis-submit" value="Connexion" style="color:#fff"></a>
               <p class="linkcontainer" ><a href="<?php echo base_url() ?>password">Mot de passe perdu ?</a>&nbsp;&nbsp;<a href="<?php echo base_url() ?>inscription">S'inscrire</a></p>
        </form>
   
</div>
</div>


<div style="color: #FAB700;">
	<div style="font-size: 20px;" scrollamount="3" direction="left">RENAULT, une gamme complète de véhicules utilitaires 
		adaptés à vos besoins. </div></div>



<div class=" line  miniHspace ">

</div>
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
  
</div>
</div>
</div>