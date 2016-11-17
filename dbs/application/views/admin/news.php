<div id="body" style="clear:both">
    <div class="PageTitleBlock fullsize">
        <div>
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle">GESTION ACTUALITE</span>
            </h1>
        </div>
    </div>
    <div id="main">
    	<div id="leftColumn">
            <div id="navigation">
                <ul>
                	<li class="open"><a href="<?=site_url() ?>/admin/news">GESTION DE L'ACTUALITE</a>
                		<ul>
                			<li><a href="<?=site_url() ?>/admin/news">Voir l'actualité</a></li>
                			<li><a href="<?=site_url() ?>/admin/news/add_news/">Ajouter une actu</a></li>
                			<li><a href="<?=site_url() ?>/admin/news/archives">Archives</a></li>
                		</ul>
                	</li>
                </ul>
            </div>
        </div>
        <div id="mainInside">
            <div class=" line  miniHspace ">
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



