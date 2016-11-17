<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<div class="page_content">
<div class="page_content_left">
<div class="lien-top"><img src="<?php echo get_bloginfo('template_directory') ?>/images/home-icon.png"><span class="home">Vous êtes ici:</span>
<a href="<?php bloginfo('url'); ?>" class="first"></a>
	<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
</div>
<?php get_search_form(); ?>
</div>
<div class="page_content_right">
<h3>OFFRES</h3>
<div class="offre_content"></div>
<h3>NOS PARTENAIRES</h3>
<div class="offre_content">
<img class="partenaires" style="margin-left:5px;" src="<?php echo get_bloginfo('template_directory') ?>/images/partenaires/hp.png">
<img class="partenaires" src="<?php echo get_bloginfo('template_directory') ?>/images/partenaires/dell.png">
<img class="partenaires" src="<?php echo get_bloginfo('template_directory') ?>/images/partenaires/fujitsu.png">
<img class="partenaires" src="<?php echo get_bloginfo('template_directory') ?>/images/partenaires/acer.png">
</div>
<h3>TOP VENTES</h3>
<div class="offre_content">
<div class="ventes_div"></div>
<div class="ventes_div"></div>
<div class="ventes_div"></div>
<div class="ventes_div"></div>
</div>
</div>
</div>
</div>

<?php get_footer();
