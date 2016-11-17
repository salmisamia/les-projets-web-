<?php echo doctype(); ?>
<head>
    <title>
        <?php if (isset($page_title)) echo $page_title;
        else { ?>
            Renault DBS - Vente véhicules Renault et Dacia - réparations, entretiens, promotions, services pour professionnels et entreprises.
        <?php } ?>    
    </title>
    <meta name="description" content="Toute la gamme auto Renault et Dacia en Algérie. Renault concessionnaire Renault et Dacia à Tizi-Ouzou, Bordj-Menail et Boumerdes. Solutions d'entretien, de réparation et de crédit auto. Service aprés vente et promotions véhicules neufs." />
    <meta name="keywords" content="" />
    <META NAME="Robots" CONTENT="All">
    <META NAME="Revisit-after" CONTENT="20"> 

<?php
	echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('css/default.css');
	echo link_tag('css/rangepage.css');
    echo link_tag('css/modelPicker.css');
    echo link_tag('css/univers.css');
    echo link_tag('css/formulaire.css');
?>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/default.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/modelPicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/LayerPopIn.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/rangepage.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/swfobject/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/jquery.bxslider.min.js"></script>
<link rel="icon" type="image/png" href="<?php echo base_url() ; ?>favicon.png" />

<script type="text/javascript">
// No Conflict jQuery
jQuery.noConflict();

</script>
    <?php 
// Code Google Analtics - Ne pas inclure en local
include_once("analyticstracking.php") 
?>
</head>
<body>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=575308682483610";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="page" class="<? if(isset($header_class)) echo $header_class ;?> <? if (isset($v_color_code)) echo $v_color_code; ?>">
		<div id="header">
			<div>
				<div class="overNav">
					<ul><li><a href="<?=base_url();?>contact/demande-information/">Contact</a></li>
						<li><a href="<?=base_url();?>devis/">Demande de devis</a></li>
                        <li><a href="<?=base_url();?>rechercher">Recherche</a></li>
                        <li><a href="<?=base_url();?>adresse">Où nous trouver ?</a></li>
                        <li><a href="<?=base_url();?>actu">Actualité</a></li>
					</ul>	
				</div>
			</div>
			<div id="headerContent">
				<a class="logo" href="<?=base_url();?>"><img src="<?php echo base_url() ; ?>img/logo/logo.png" alt="Logo Renault"></a>
				<div id="titleAnim">
					<div class="randomImg" >

                        <form action="<?=base_url();?>search" method="POST">
                            <input type="text" name="search_value"/>
                            <input type="submit" value="rechercher">
                        </form>
                    </div>	
					<div id="titleNav">Renault DBS</div><div id="subTitleNav"> <span></span></div>
				</div>
			</div>
			<script type="text/javascript" charset="utf-8">

    var preLaunch55 = {};
    var postLaunch55 = {};
    var ConfigMenu = {};

    ConfigMenu['id_00306472'] = {};

    ConfigMenu['id_00306472']['id_00431597'] = "<?php echo base_url() ; ?>img/models/TW2/rangepage-off.png";

    ConfigMenu['id_00306753'] = {};

    ConfigMenu['id_00306753']['id_00306755'] = "<?php echo base_url() ; ?>img/models/CT5/rangepage-off.png";

    ConfigMenu['id_00306982'] = {};

    ConfigMenu['id_00306982']['id_00307026'] = "<?php echo base_url() ; ?>img/models/CL24/rangepage-off.png";

    ConfigMenu['id_00306982']['id_00316737'] = "<?php echo base_url() ; ?>img/models/CL3/rangepage-off.png";

    ConfigMenu['id_00306982']['id_00317459'] = "<?php echo base_url() ; ?>img/models/CL3_PH2_RS/rangepage-off.png";

    ConfigMenu['id_00306982']['id_00317659'] = "<?php echo base_url() ; ?>img/models/CL4/rangepage-off.png";

    ConfigMenu['id_00306601'] = {};

    ConfigMenu['id_00306601']['id_00306677'] = "<?php echo base_url() ; ?>img/models/M3B/rangepage-off.png";

    ConfigMenu['id_00306601']['id_00306642'] = "<?php echo base_url() ; ?>img/models/M3D/rangepage-off.png";

    ConfigMenu['id_00306601']['id_00306715'] = "<?php echo base_url() ; ?>img/models/M3E/rangepage-off.png";

    ConfigMenu['id_00306601']['id_00306602'] = "<?php echo base_url() ; ?>img/models/M3D_RS/rangepage-off.png";

    ConfigMenu['id_00306793'] = {};

    ConfigMenu['id_00306793']['id_00306829'] = "<?php echo base_url() ; ?>img/models/KP2/rangepage-off.png";

    ConfigMenu['id_00306864'] = {};

    ConfigMenu['id_00306864']['id_00306901'] = "<?php echo base_url() ; ?>img/models/S3C/rangepage-off.png";

    ConfigMenu['id_00318459'] = {};

    ConfigMenu['id_00318459']['id_00318460'] = "<?php echo base_url() ; ?>img/models/FLU/rangepage-off.png";

    ConfigMenu['id_00306940'] = {};

    ConfigMenu['id_00306940']['id_00487523'] = "<?php echo base_url() ; ?>img/models/KOL2/rangepage-off.png";

    ConfigMenu['id_00306521'] = {};

    ConfigMenu['id_00306521']['id_00306522'] = "<?php echo base_url() ; ?>img/models/LC3/rangepage-off.png";

    ConfigMenu['id_00317519'] = {};

    ConfigMenu['id_00317519']['id_00306457'] = "<?php echo base_url() ; ?>img/models/L43/rangepage-off.png";

    ConfigMenu['id_00372014'] = {};

    ConfigMenu['id_00372014']['id_00371970'] = "<?php echo base_url() ; ?>img/models/TFP/rangepage-off.png";

    ConfigMenu['id_00307402'] = {};

    ConfigMenu['id_00307402']['id_00307403'] = "<?php echo base_url() ; ?>img/models/KU2/rangepage-off.png";

    ConfigMenu['id_00307365'] = {};

    ConfigMenu['id_00307365']['id_00307366'] = "<?php echo base_url() ; ?>img/models/MAU/rangepage-off.png";

    ConfigMenu['id_00319578'] = {};

    ConfigMenu['id_00319578']['id_00319579'] = "<?php echo base_url() ; ?>img/models/TFU/rangepage-off.png";

    ConfigMenu['id_00326002'] = {};

    ConfigMenu['id_00326002']['id_00326003'] = "<?php echo base_url() ; ?>img/models/52L/rangepage-off.png";

    ConfigMenu['id_00328001'] = {};

    ConfigMenu['id_00328001']['id_00328003'] = "<?php echo base_url() ; ?>img/models/90K2/rangepage-off.png";

    ConfigMenu['id_00329003'] = {};

    ConfigMenu['id_00329003']['id_00329004'] = "<?php echo base_url() ; ?>img/models/79H/rangepage-off.png";

    ConfigMenu['id_00329004'] = {};

    ConfigMenu['id_00329004']['id_00329005'] = "<?php echo base_url() ; ?>img/models/52B/rangepage-off.png";    

    ConfigMenu['id_00436313'] = {};

    ConfigMenu['id_00436404'] = {};

    ConfigMenu['id_00436406'] = {};

    ConfigMenu['id_00436408'] = {};

    ConfigMenu['id_00436410'] = {};

    ConfigMenu['id_00436412'] = {};

    ConfigMenu['id_00436414'] = {};

    ConfigMenu['id_00436416'] = {};

    ConfigMenu['id_00436418'] = {};

    ConfigMenu['id_00436420'] = {};

    ConfigMenu['id_00436423'] = {};

    ConfigMenu['id_00436425'] = {};

    ConfigMenu['id_00436427'] = {};

    ConfigMenu['id_00436429'] = {};

    ConfigMenu['id_00436436'] = {};

    ConfigMenu['id_00436440'] = {};

    ConfigMenu['id_00436444'] = {};

    ConfigMenu['id_00436453'] = {};

    ConfigMenu['id_00436457'] = {};

    ConfigMenu['id_00436459'] = {};

    ConfigMenu['id_00436465'] = {};

    ConfigMenu['id_00436469'] = {};
</script>
<ul id="menu">
    <li class="sub1 first"><a href="<?=base_url();?>vehicules"><span>VÉHICULES PARTICULIERS</span><span class="roll">VÉHICULES PARTICULIERS</span></a>
       
</li>
<li class="sub2"><a href="<?=base_url();?>vehicules_utilitaires/"><span>VÉHICULES UTILITAIRES</span><span class="roll">VÉHICULES UTILITAIRES</span></a>

</li>

<li class="sub3"><a href="<?=base_url();?>apres_vente"><span>APRÈS VENTE</span><span class="roll">APRÈS VENTE</span></a>
</li>
<li class="sub5"><a href="<?=base_url();?>presentation"><span>PRESENTATION</span><span class="roll">PRESENTATION</span></a>
   
  
</li>
<li class="sub5"><a href="http://www.autobip.com/comparateur-voitures-algerie" target="_blank"><span>Comparateur de Prix</span><span class="roll">Comparateur de Prix</span></a></li>

</li>
</ul>
<div class="fb-like" style="position:absolute; top:120px; right:0px;" data-href="https://www.facebook.com/pages/Renault-Tizi-Ouzou/706035899473722?fref=ts" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
<!-- googleon: all -->
<!--sitename=[renault-dz]-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=752321378141581&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php 
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>