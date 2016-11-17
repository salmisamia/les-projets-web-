</div>
<!-- end header -->

<!--main content-->
 <div id="body">
	<div class="PageTitleBlock fullsize">
		<div class="actionButtons">
			<a class="print" href="#" onclick="openPrintVersion();return false;">Imprimer</a>
			<a class="send" href="#" onclick="sendToAFriend();return false;">Envoyer à un ami</a>
		</div>
		<div class="withActionButtons">

			<h1 class="pageTitle">
				<span class="cufonTitle" id="pageTitle"><?=$vehicule_details[0]['vehicule_name'];?></span>
				<span class="pageSSTitle"><span></span></span>
			</h1>

		</div>
	</div>
    <div id="main">
    	<div xmlns="" id="leftColumn">
    		<div id="navigation">
    			<ul>
    				<li class="open">
              <a href="<?=base_url() . $vehicule_details[0]['gamme_name_slug'] .'/'. $vehicule_details[0]['modele_name_slug'] .'/'. $vehicule_details[0]['vehicule_name_slug']; ?>/presentation-generale" title=""><span>Présentation générale</span></a></li>
    			</ul>
    		</div>
    	</div>
    	<div xmlns="" id="mainInside">
    		<!--main content--><!--in otherwise-->
    		<div class=" line  mediumBspace  miniHspace ">
                <div class=" unit size1on1 lastunit ">
                    <div class=" block  noresize  noresize ">
                        <div class=" blockInside ">
                            <div class="body">
                                <div id="view" class="withTickers">
                                    <div id="viewMedia">
                                        <div class="visualView">
                                            <img class="imgBack" alt="Un design à l'image de votre personnalité !"
                                                src="<?=base_url() . 'img/'. $vehicule_details[0]['gamme_name_slug'] . '/' . $vehicule_details[0]['vehicule_name_slug'] . '/presentation-default-img.jpg' ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
       <div class=" line  largeHspace ">
        <div  class=" unit size1on2">
          <div class=" block  noresize ">
            <div class=" blockInside ">
              <div class="body">
                <div class="text">
                  <p></p>
                  <p><span class="gray"><?=$vd_2['presentation_text_1'] ?></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div  class=" unit size1on2 lastunit">
          <div class=" block  noresize ">
            <div class=" blockInside ">
              <div class="body">
                <div class="text">
                  <p></p>
                  <p><span class="gray"><?=$vd_2['presentation_text_2'] ?></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>          
    	</div>

        <div id="rightColumn">
            <div class=" line  miniHspace ">
                <div class="block bMarginxSm">
                   <div class="blockInside">
                      <div class="body">
                         <div class="mediaFullSize">
                          <? $file = base_url(). 'img/'. $vehicule_details[0]['gamme_name_slug'] . '/' . $vehicule_details[0]['vehicule_name_slug'] . '/frag_droite/img.jpg';
                          $file_headers = @get_headers($file);
                          if (!($file_headers[0] == 'HTTP/1.1 404 Not Found')): ?>
                          <img alt="" src="<?=$file?>" />
                        <? endif; ?>
                        </div>
                      </div>
                   </div>
                </div>
                <div class="block blockFilledUniverse insideSpace">
                   <div class="blockInside">
                      <div class="body"><input id="iframeResizable" type="hidden" value="false">
                          <div class="title">
                            <h2 class="cufonize"><?=strtoupper($vd_2['desc_text_1']);?></h2>
                         </div>
                         <ul class="productAction">
                            <li class="brochure last twoLines"><a href="#" ONCLICK="" title="Demandez une brochure">Demandez une brochure</a></li>
                         </ul>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>		
</div>									
						    
        

