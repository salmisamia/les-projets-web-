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
                <span class="cufonTitle" id="pageTitle"><?=$page['sub_page_name']?></span>
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
                    </li>
                <? endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="mainInside">
            <div class=" line miniHspace ">
                <div class=" unit size1on1 lastunit ">
                    <div class=" block  noresize ">
                        <div class=" blockInside ">
                            <div class="body">
                                <?=$page_content?>  
                                <? if (isset($socialshare)) echo $socialshare?>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>                             
        </div>
          <?=$page_right_content?>
    </div>
</div>