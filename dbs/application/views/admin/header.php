<?php echo doctype(); ?>
<head>
    <title>
        <? if (isset($page_title)) echo $page_title;
        else { ?>
            Racinauto Agent Renault Algérie - Vente véhicules Renault et Dacia - réparations, entretiens, promotions, services pour professionnels et entreprises.
        <?php } ?>    
    </title>
    <meta name="description" content="Toute la gamme auto Renault et Dacia en Algérie. Racinauto concessionnaire Renault et Dacia à Tizi-Ouzou, Bordj-Menail et Boumerdes. Solutions d'entretien, de réparation et de crédit auto. Service aprés vente et promotions véhicules neufs." />
    <meta name="keywords" content="Renault, Dacia, Automobile, Auto, Véhicule, Concessionaire, entretien, mécanique, réparation, neufs, prix, clio, symbol, twingo, mégane, " />
    <META NAME="Robots" CONTENT="All">
    <META NAME="Revisit-after" CONTENT="20"> 

<?php
	echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('css/default.css');
?>
<style type="text/css">
.news-entry {border:2px solid #eee;margin:0 5px 5px;padding: 10px;}
.actions-block {float: right;}
.actions-block a {font-size: 10pt;font-weight: bold;color:#444;}
.container-form-login { overflow:auto;margin: 0; padding:20px;border-radius:2px;border:5px solid #e5e5e5;box-shadow: -2px 2px 1px #bbb;}
.container-form-login h1 {font-size: 20pt;text-transform: uppercase;font-family: arial;color:#000;margin:5px;margin-left:0;padding: 0;letter-spacing: -2px;}
input.field {border:1px solid #aaa; background:#fff;height:25px;margin:2px;padding: 0 2px;}
label {text-transform: uppercase;font-family: arial;font-size: 9pt;color:#000;}
.btn {margin:10px 10px 0 0;background:#eee;padding: 5px 20px;color:#000;border:0;cursor:pointer;float:right;box-shadow: 2px 2px 2px #bbb;}
</style>
<script type="text/javascript" src="<?php echo base_url() ; ?>js/default.js"></script>
<link rel="icon" type="image/png" href="<?php echo base_url() ; ?>favicon.png" />

<script type="text/javascript">
// No Conflict jQuery
jQuery.noConflict();

</script>
</head>
<body>
	<div id="page" class=" pageNav bandeauBlanc  ">
		<div id="header">
			<div>
				<div class="overNav">
					<ul>
						<li><a href="<?=site_url();?>/admin/admin/logout">Déconnexion</a></li>
						<li><a href="#">Bienvenue <?php echo $username; ?> !</a></li>
						
					</ul>	
				</div>
			</div>
			<div id="headerContent">
				<a class="logo" href="<?=base_url();?>"><img src="<?php echo base_url() ; ?>img/logo/logo.png" alt="Logo Renault"></a>
				<div id="titleAnim">
					<div class="randomImg" style="background-image:url(<?php echo base_url() ; ?>img/skin/packshot/packshot-nouvelle-clio.jpg)" alt="Packshot Nouvelle Renault Clio"></div>	
					<div id="titleNav">RACINAUTO | Espace Administrateur</div><div id="subTitleNav"> <span></span></div>
				</div>
			</div>
			<div class="breadcrumb">
				<ul>
					<li class="first"><a href="<?php echo site_url(); ?>/admin">Accueil</a></li>
				</ul>
			</div>
		</div>	