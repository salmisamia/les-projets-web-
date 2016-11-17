<div id="body">
    <div class="PageTitleBlock fullsize">
       <? if (isset($with_action_btns)): ?>
        <div class="actionButtons">
            <a class="print" href="#" onclick="openPrintVersion();return false;">Imprimer</a>
            <a class="send" href="#" onclick="sendToAFriend();return false;">Envoyer à un ami</a>
        </div>
        <? endif; ?>
        <div <? if (isset($with_action_btns)): ?> class="withActionButtons" <? endif; ?>>
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle"><?=$page['sub_sub_page_name']?></span>
                <span class="pageSSTitle"><span></span></span>
            </h1>
        </div>
    </div>
    <div id="main">
        <div id="leftColumn">
            <div id="navigation">
                <ul>
                <? foreach ($s_page as $item): ?>
                    <li <? if ($item['sub_page_name_slug']==$this->uri->segment(2)): ?> class="open" <?endif;?>>
                        <a href="<?=base_url() . $page['page_name_slug'] . '/' . $item['sub_page_name_slug'] ?>"><span><?=$item['sub_page_name']?></span></a>
                        <? if ($item['sub_page_name_slug']==$this->uri->segment(2) && isset($ss_pages)): ?> 
                            <ul>
                            <? foreach ($ss_pages as $ss_item): ?>
                            <li><a href="<?=base_url() . $page['page_name_slug'] . '/' . $item['sub_page_name_slug'] . '/' . $ss_item['sub_sub_page_name_slug']; ?>" ><span><?=$ss_item['sub_sub_page_name']?></span></a></li>
                            <? endforeach; ?>
                            </ul>
                        <? endif; ?>
                    </li>
                <? endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="mainInside">
            <div class=" line miniHspace ">
                <div class=" unit size1on1 lastunit ">
                    <div class=" block  noresize  blockFilledUniverse insideSpace ">
                        <div class=" blockInside ">
                            <div class="body">
                                <div class="text">
                                    <p>
                                        <h2 class="setCufonTitle22"><?=strtoupper($page['sub_sub_page_name'])?></h2>
                                    </p>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>                 
              <?=$page_content?>  
            
        </div>
 
    </div>
</div>