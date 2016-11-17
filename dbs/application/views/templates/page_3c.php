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
                <span class="cufonTitle" id="pageTitle"><?=$page[0]['page_name']?></span>
                <span class="pageSSTitle"><span><?=$page[0]['page_sub_title']?></span></span>
            </h1>
        </div>
    </div>
    <div id="main">
      
        <div id="mainInside">
            <div class=" line  <? //if (isset($)): ?> miniHspace ">
                <div class=" unit size1on1 lastunit ">
                    <div class=" block  noresize ">
                        <div class=" blockInside ">
                            <div class="body">
                                <?=$page_content?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>