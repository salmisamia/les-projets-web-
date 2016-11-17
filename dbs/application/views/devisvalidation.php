<div id="body">
    <div class="PageTitleBlock fullsize">
        
        <div class="withActionButtons">
            <h1 class="pageTitle">
           <span class="cufonTitle" id="pageTitle">Votre devis</span>
                <span class="pageSSTitle"><span> </span></span>
            </h1>
        </div>
    </div>
<div id="main">
<div id="mainInside">
    <div class=" line  miniHspace ">
        <div class=" unit size1on1 lastunit ">
            <div class=" block  noresize ">
                <div class=" blockInside ">
                    <div class="body">

<?php if($nom==''){ echo "<span style='color:red; font-weight:bold;'>Vous devez remplir tout les champs !!!</span>";
 
?>

<form action="<?=base_url();?>devisvalidation" style="width:350px; margin:auto;" id="devisform" method="POST" name="devisform">

  <label>Nom de véhicule  *</label><br/><input name="nom" class="skinnedInput"> <br/> 

 <label>Couleur de véhicule *</label> <select class="skinnedInput" style="width: 338px;" name="thelist" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  <option>Blanc</option>
  <option>Noir</option>
  <option>Gris</option></select></br></br>
   <label>Climatisation *  &nbsp;&nbsp;&nbsp;&nbsp;</label> <select style="width: 338px;" class="skinnedInput" name="thelist" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  &nbsp;&nbsp;&nbsp;&nbsp;  <option>avec climatisation</option>
  <option>sans climatisation</option></select></br>
     <label>Peinture mitalisée *  &nbsp;&nbsp;&nbsp;&nbsp;</label> <select style="width: 338px;" class="skinnedInput" name="autre" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  &nbsp;&nbsp;&nbsp;&nbsp;  <option>avec </option>
  <option>sans </option></select></br>
 <div class="floatR vMargin">
            <a href="#" class="validate bouton boutonUnivers" id="btnVal"><input type="submit" name="devis-submit" value="valider" style="color:#fff"></a>
</div>
</form>
<?php } else{ ?>

  <span style="color: #333;"><?php echo '<li style="font: bold 12px/18px sans-serif;
display: inline-block;
margin-right: -4px;
position: relative;
padding: 15px 20px;
background-color: #22ACE2;">Nom de vehicule:'.$nom."</li>";?><?php echo'<li style="font: bold 12px/18px sans-serif;
display: inline-block;
margin-right: -4px;
position: relative;
padding: 15px 20px;
background-color: #22ACE2;">Climatisation:'.$clim."</li>";} ?></span>
 


  <?php 
$my_query = new WP_Query('category_name=veh-par');

$query_archives_news = new WP_Query('category_name=veh-par');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $nom) { ?>
    
          <?php the_meta() ?>

<?php } ?>
<?php  endwhile;?>
  <?php 
$my_query = new WP_Query('category_name=veh-uti');

$query_archives_news = new WP_Query('category_name=veh-uti');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php if (get_the_title()== $nom) { ?>
    <?php the_meta() ?>

<?php } ?>
<?php  endwhile;?>





<li style="font: bold 12px/18px sans-serif;
display: inline-block;
margin-right: -4px;
position: relative;
padding: 15px 20px;
background-color: #FAB700;"> Prix Total : Prix de vehicule<?php if($clim=="avec climatisation"){echo
'+25 000 DA' ;}if($autre=="avec"){echo
'+70 000 DA' ;} ?> </li>


<!--webform -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>