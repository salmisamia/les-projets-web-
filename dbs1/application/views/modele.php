</div>
<script type="text/javascript">

    var openingType = {
        "leadformPublished" : "false",
        "leadformName"      : "",
        "openingType"       : "",
        "customUrl"         : ""
    }

    function submitRangeForm(formId) {
        if(openingType && (openingType.leadformPublished=="true")) {
            var parameterList = jQuery("#" + formId).serializeArray();
            var parameterMap = {};
            jQuery.each(parameterList, function() {
                parameterMap[this.name] = this.value;
            });
            renault.leadforms.open(openingType, parameterMap, {});
        } else {
            // webform default behaviour.
            jQuery("#" + formId).submit();
        }
    }

</script>
<script type="text/javascript">
    debug=false;
    modelIndex = 0;
    configurableModelIndex = 0;
    financeParametersArray = new Array();
    hasMakolabOffers = new Array(); // not to load makolab offers twice
    htmlDivsToUpdate = new Array(); // stores div IDs to fill with finance parameters
    delayFinance = 0;


    function updateFinanceParameters(id){
        if(hasMakolabOffers[id] == false) {
            var currentConfigurableModel = 0;
            for (var currentConfigurableModel=0; currentConfigurableModel<financeParametersArray[id].length; currentConfigurableModel++){
                financeParameters = financeParametersArray[id][currentConfigurableModel];
                (function(configurableModelIndex) {
                    componentFinanceLib.getMakolabOffersVN( financeParameters , 'vnRangePage' , ['.' + htmlDivsToUpdate[id][this]]);
                }).delay( delayFinance , currentConfigurableModel );
            }
            hasMakolabOffers[id] = true;
        }
    }

</script>

<!-- end header -->

<!--main content-->
 <div id="body">
		<script xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns="" type="text/javascript">
			var cmsModelName = '';
		</script>
		<div class="PageTitleBlock fullsize">
			<div class="actionButtons">
				<a class="print" href="#" onclick="openPrintVersion();return false;">Imprimer</a>
				<a class="send" href="#" onclick="sendToAFriend();return false;">Envoyer à un ami</a>
			</div>
			<div class="withActionButtons">

				<h1 class="pageTitle">
					<span class="cufonTitle" id="pageTitle">LA GAMME RACINAUTO</span>
					<span class="pageSSTitle"><span><?=$gamme_name;?></span></span>
				</h1>

			</div>
		</div>
<div id="main">
	<div xmlns="" id="leftColumn">
		<div id="nav_rangepage">
			<ul>
				<?php foreach ($gammes_list as $gamme): ?>
				<li><a href="<?=base_url() . $gamme['gamme_name_slug']; ?>" title="<?=$gamme_name;?>"><span><?=$gamme['gamme_name'];?></span></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div xmlns="" id="mainInside">
		<!--main content--><!--in otherwise-->
		<div class=" line  miniHspace ">
			<div class=" unit size1on1 lastunit ">
				<div class=" block  noresize ">
					<div class=" blockInside ">
						<div class="body">   
							<div id="rangepage">
								<? 
									$i = 0;
									foreach ($modeles_list as $modele): ?>
    							<div class="line">
						            <div class="unit size1on5">
						                <h2 class="h3"><span class="hInside"><?=$modele['modele_name']; ?></span></h2>
						            </div>
						            <div class="unit lastunit">
						                <div class="h_scroller">
						                    <ul>
						                    	<? 
						                    		while ( !empty($veh_list[$i]) && $veh_list[$i]['modele_name'] == $modele['modele_name'] )
						                    		{ ?>
								      					<li>
								      						 <script>
                                        modelIndex = 1;
                                        configurableModelIndex = 0;
                                        hasMakolabOffers[modelIndex] = false;
                                        financeParametersArray[modelIndex] = new Array();
                                        htmlDivsToUpdate[modelIndex] = new Array();
                                    </script>
								      						<a href="#" onmouseover="javascript:updateFinanceParameters(1);">
								      							<img src="<?=base_url();?>img/models/<?=strtoupper($veh_list[$i]['vehicule_code'])?>/rangepage-off.png" alt="<? echo strtoupper($veh_list[$i]['vehicule_name']); ?>" />
								      							<span><?=$veh_list[$i]['vehicule_name'];?></span>
								      						</a>
								      						<div class="rangePageLayer " >
                                        <div class="block blockFilledUniverse insideSpace2">
                                            <div class="blockInside">
                                                <div class="body">
                                                    <h3 class="h4"><?=$veh_list[$i]['vehicule_name']; ?></h3>
                                                    <script type="text/javascript" >
                                                        <!-- refactoring finance params -->
                                                        financeParametersArray[modelIndex][configurableModelIndex] = {
                                                            "country"       : 'DZ',
                                                            "lang"          : 'fr',
                                                        
                                                            
                                                            
                                                                    "price"         : "996000.0",
                                                                    "priceWoOptions": "996000.0",
                                                                    "promo": "false",
                                                            
                                                        
                                                                "seg"        : "C",
                                                                "model"  : "X442BIVPTW2",
                                                                "idVehicle"     : "TW2",
                                                                "version"       : "PR612CC4",
                                                                "power"         : "NC",
                                                                "engine"        : "ESSENCE",
                                                                "priceType"     : "TTC"
                                                            };
                                                            htmlDivsToUpdate[modelIndex][configurableModelIndex] = "monthPrice1";
                                                            <!-- end refactoring finance params -->
                                                    </script>
                                                    
                                                        
                                                            <div class="prices">
                                                                <span class="begin">À partir de</span>
                                                                <span class="totalPrice">
                                                                                
                                                                                    996 000,00 DZD   
                                                                    
                                                                </span>
                                                                <span class="monthPrice1"></span>
                                                            </div>
                                                        
                                                        
                                                    
                                                    <ul>
                                                        <li>
                                                            <a href="twingo/twingo/nouvelle-twingo/presentation-generale/index.html">
                                                                
                                                                    
                                                                    
                                                                        DÉCOUVREZ
                                                                    
                                                                
                                                            </a>
                                                        </li>
                                                        
                                                                <li>
                                                                    <a href="../gamme-renault/vehicules-particuliers/twingo/twingo/twingo/configurateur/index.html">
                                                                        
                                                                            
                                                                            
                                                                                CONFIGUREZ
                                                                            
                                                                        
                                                                    </a>
                                                                </li>
                                                            
                                                        
                                                        
                                                            <li>
                                                                <a href="javascript:submitRangeForm('rdvForm1');">
                                                                    Essayer ce véhicule
                                                                </a>
                                                            </li>
                                                        
                                                    </ul>
                                                    
                                                    <script>
                                                        configurableModelIndex++ ;
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								      					</li>
								      					<?
								      					$i++; 
									      			}
						      					?>
											</ul>
										</div>
									</div>
								</div>	
							<?php endforeach; ?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>									
						    
        

