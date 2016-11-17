</div>
<!-- end header -->

<!--main content-->
<div id="body">
    <div id="main">
        <div id="mainInside">
<div id="homepageContent" class="blockHomepage withRightCol bMargin">

<div class="homepageMedia">
<img src="<?=base_url();?>web/application/views/avril2014.jpg">
</div>

<div class="homepageRight">
    <div class="block blockRight bMarginxSm">
        <div class="blockInside">
            <div class="body">
                <a href="https://www.facebook.com/pages/RACINAUTO-Agent-Renault-Alg&#xe9;rie/46306713397" target="_blank"><div style="background:url(img/pub/bg-fb.png) no-repeat;width:183px;height:130px;">
                <div class="fb-like" style="padding:59px 0 0 109px;" data-href="https://www.facebook.com/pages/RACINAUTO-Agent-Renault-Alg&#xe9;rie/46306713397" data-send="false" data-layout="box_count" data-width="180" data-show-faces="false"></div>
                </div></a>
            </div>
        </div>
    </div>
    <div class="block blockRight bMarginxSm">
        <div class="blockInside">
            <div class="body">
                <div class="mediaImage">
                    <object type="application/x-shockwave-flash" data="<?=base_url() ?>flash/animation-petite-zone-droite.swf" width="185" height="130" id="idb6d4b47b-0116-41e7-9348-7154397d5cff" style="visibility: visible; "><param name="wmode" value="transparent"><param name="allowScriptAccess" value="always"></object>
                </div>
                    <script xmlns="http://www.w3.org/1999/xhtml" type="text/javascript">
                                    swfobject.embedSWF("<?=base_url() ?>flash/animation-petite-zone-droite.swf",
                                    "idb6d4b47b-0116-41e7-9348-7154397d5cff",
                                    "185",
                                    "130",
                                    "9.0.0", "expressInstall.swf",{},{wmode:'transparent',allowScriptAccess:'always'},{});
                    </script>
                    <div class="mediaText mediaTextleft"><h1 class="titleHome cufonize">   </h1><div class="link"></div></div>
            </div>
        </div>
    </div>                  
    <div class="block blockRight blockRightFilled insideSpace">
        <div class="blockInside">
            <div class="body">
                <h3 class="titleActus cufonize">Actualités</h3>
                <div class="listContenusLink">
                    <ul>
                        <?php
                        $this->load->helper('text');

                            foreach ($newslist as $news) { ?>
                            <li>
                                <a href="<?=base_url();?>decouvrez-racinauto/a-la-une/<?=$news['url'] ?>" ONCLICK="" CLASS="chevron" title="La fiabilité des véhicules Renault distinguée par L’Automobile Magazine"><?=word_limiter($news['title'], 7) ?></a>
                            </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class=" line  miniHspace ">
     <div class="unit size1on1 lastunit ">
        <div class=" block  noresize ">
            <div class=" blockInside ">
                <div class="body">
<div id="modelPicker">
    <ul>
		<li class="first">
			<a href="#">Véhicules Particuliers<span class="pointer"></span></a>
                    <div>
                        <ul class="invisible">
							<li class="first" id="id_548">
								<a href="#"><span>Twingo</span><span class="roll">Twingo</span></a>
                                	<ul class="sub_img">
										<li id="id_1719" style="height:96px;">
											<a href="<?=base_url();?>vehicules-particuliers/twingo/nouvelle-twingo/">
                                                        <!--<img src="" alt="TWINGO"/>-->
                                            TWINGO
                                            </a>
                                        </li>
                                    </ul>
                            </li>

                                        <li id="id_579">
											<a href="#"><span>SYMBOL</span><span class="roll">SYMBOL</span>    
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1748" style="height:96px;">

                                                    <a href="<?=base_url();?>vehicules-particuliers/symbol/symbol/">
                                                        <!--<img src="" alt="SYMBOL"/>-->
                                                        SYMBOL
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                                        <li id="id_549">
										 <a href="#"><span>Clio</span><span class="roll">Clio</span>
                                                
                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1722" style="height:96px;">

                                                    <a href="vehicules-particuliers/clio/nouvelle-clio/">
                                                        <!--<img src="" alt="CLIO BERLINE"/>-->
                                                        NOUVELLE CLIO
                                                    </a>
                                                </li>
                                                <li id="id_1721" style="height:96px;">

                                                    <a href="vehicules-particuliers/clio/clio-campus/">
                                                        <!--<img src="" alt="CLIO CAMPUS"/>-->
                                                        CLIO CAMPUS
                                                    </a>
                                                </li>
                                                <li id="id_1780" style="height:96px;">

                                                    <a href="vehicules-particuliers/clio/clio-rs/">
                                                        <!--<img src="" alt="CLIO RENAULT SPORT"/>-->
                                                        CLIO RENAULT SPORT
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                                        <li id="id_569">

                                                <a href="#"><span>KANGOO</span><span class="roll">KANGOO</span>

                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1724" style="height:96px;">

                                                    <a href="vehicules-particuliers/kangoo/kangoo/" >
                                                        <!--<img src="" alt="NOUVEAU KANGOO"/>-->
                                                        NOUVEAU KANGOO
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>

                                        <li id="id_570">

                                                <a href="#"><span>MEGANE</span><span class="roll">MEGANE</span>
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1727" style="height:96px;">

                                                    <a href="vehicules-particuliers/megane/megane-berline">
                                                        <!--<img src="" alt="NOUVELLE MEGANE BERLINE"/>-->
                                                        NOUVELLE MEGANE BERLINE
                                                    </a>
                                                </li> 
                                                
                                                <li id="id_1728" style="height:96px;">

                                                    <a href="vehicules-particuliers/megane/megane-coupe/">
                                                        <!--<img src="" alt="MÉGANE COUPÉ"/>-->
                                                        MÉGANE COUPÉ
                                                    </a>
                                                </li>

                                                <li id="id_1730" style="height:96px;">

                                                    <a href="vehicules-particuliers/megane/megane-coupe-cabriolet/">
                                                        <!--<img src="" alt="MÉGANE COUPÉ-CABRIOLET"/>-->
                                                        MÉGANE COUPÉ-CABRIOLET
                                                    </a>
                                                </li>

                                                <li id="id_1779" style="height:96px;">

                                                    <a href="vehicules-particuliers/megane/megane-rs/">
                                                        <!--<img src="" alt="MÉGANE RENAULT SPORT"/>-->
                                                        MÉGANE RENAULT SPORT
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                                        <li id="id_571">

                                                <a href="#"><span>SCENIC</span><span class="roll">SCENIC</span>
 
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1733" style="height:96px;">
                                                    <a href="vehicules-particuliers/scenic/scenic/">
                                                        <!--<img src="" alt="SCENIC"/>-->
                                                        SCENIC
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>

                                        <li id="id_572">
                                                <a href="#"><span>FLUENCE</span><span class="roll">FLUENCE</span>

                                        </a>
                                        <ul class="sub_img">
                                            
                                                <li id="id_1734" style="height:96px;">
											
                                                    <a href="vehicules-particuliers/fluence/fluence/">
                                                        <!--<img src="" alt="fluence"/>-->
                                                        fluence
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                            
                                        <li id="id_573">
                                            
                                                <a href="#"><span>KOLEOS</span><span class="roll">KOLEOS</span>
                                                
                                        </a>
                                        <ul class="sub_img">
                                            
											<li id="id_2219" style="height:96px;">

                                                    <a href="vehicules-particuliers/koleos/koleos/" >
                                                        <!--<img src="" alt="KOLEOS"/>-->
                                                        KOLEOS
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>  
                                        <li id="id_574">

                                                <a href="#"><span>LAGUNA</span><span class="roll">LAGUNA</span>
                                                
                                            
                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1741" style="height:96px;">

                                                    <a href="vehicules-particuliers/laguna/laguna-coupe">
                                                        <!--<img src="" alt="LAGUNA COUPÉ"/>-->
                                                        LAGUNA COUPÉ
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>

                                        <li id="id_575">

                                                <a href="#"><span>LATITUDE</span><span class="roll">LATITUDE</span>

                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1743" style="height:96px;">

                                                    <a href="vehicules-particuliers/latitude/latitude">
                                                        <!--<img src="" alt="NOUVELLE LATITUDE"/>-->
                                                        NOUVELLE LATITUDE
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li> 
                                        <li class="last" id="id_577">
                                                <a href="#"><span>TRAFIC PASSENGER</span><span class="roll">TRAFIC PASSENGER</span>

                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1745" style="height:96px;">
                                                    <a href="<?=base_url();?>vehicules-particuliers/nouveau-trafic-passenger/nouveau-trafic-passenger/">
                                                        <!--<img src="" alt="TRAFIC PASSENGER & GÉNÉRATION"/>-->
                                                        TRAFIC PASSENGER & GÉNÉRATION
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                            
                        </ul>
                    </div>
            </li>

                    <li class="last">

                            <a href="#">Véhicules Utilitaires<span class="pointer"></span>
                    </a>
                    <div>
                        <ul class="invisible">

                                        <li class="first" id="id_580">
                                        
                                                <a href="#"><span>kangoo</span><span class="roll">kangoo</span>

                                        </a>
                                        <ul class="sub_img">
                                            
                                                <li id="id_1749" style="height:96px;">

                                                    <a href="vehicules-utilitaires/kangoo-express/kangoo-express/">
                                                        <!--<img src="" alt="KANGOO"/>-->
                                                        KANGOO
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                                        <li id="id_588">

                                                <a href="#"><span>Trafic</span><span class="roll">Trafic</span>

                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1759" style="height:96px;">

                                                    <a href="vehicules-utilitaires/nouveau-trafic/nouveau-trafic/">
                                                        <!--<img src="" alt="Trafic"/>-->
                                                        Trafic
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>

                                        <li class="last" id="id_581">
						<a href="#"><span>Master</span><span class="roll">Master</span>     
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1760" style="height:96px;">
                                                    <a href="vehicules-utilitaires/master/nouveau-master/">
                                                        <!--<img src="" alt="MASTER"/>-->
                                                        MASTER
                                                    </a>
                                                </li>
                                        </ul>
                                </li>

                        </ul>
                    </div>
            </li>
            <li class="last">

                            <a href="#">Véhicules Dacia<span class="pointer"></span>
                    </a>
                    <div>
                        <ul class="invisible">

                                        <li class="first" id="id_593">
                                        
                                                <a href="#"><span>Logan</span><span class="roll">Logan</span>

                                        </a>
                                        <ul class="sub_img">
                                            
                                                <li id="id_1871" style="height:96px;">

                                                    <a href="vehicules-dacia/logan/logan/">
                                                        <!--<img src="" alt="KANGOO"/>-->
                                                        LOGAN
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>
                                        <li id="id_590">

                                                <a href="#"><span>Logan MCV</span><span class="roll">Logan MCV</span>

                                        </a>
                                        <ul class="sub_img">
                                                <li id="id_1870" style="height:96px;">

                                                    <a href="vehicules-dacia/logan-mcv/logan-mcv/">
                                                        <!--<img src="" alt="Trafic"/>-->
                                                        LOGAN MCV
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                </li>

                                        <li class="last" id="id_591">
                        <a href="#"><span>Sandero</span><span class="roll">Sandero</span>     
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1880" style="height:96px;">
                                                    <a href="vehicules-dacia/sandero/sandero/">
                                                        <!--<img src="" alt="MASTER"/>-->
                                                        SANDERO
                                                    </a>
                                                </li>
                                        </ul>
                                </li>
                                               <li class="last" id="id_592">
                        <a href="#"><span>Duster</span><span class="roll">Duster</span>     
                                        </a>
                                        <ul class="sub_img">

                                                <li id="id_1890" style="height:96px;">
                                                    <a href="vehicules-dacia/duster/duster/">
                                                        <!--<img src="" alt="MASTER"/>-->
                                                       DUSTER
                                                    </a>
                                                </li>
                                        </ul>
                                </li>
                                
                        </ul>
                    </div>
            </li>
    </ul>
</div>
</div>
</div>
</div>
</div>
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

</div>
</div>
</div>