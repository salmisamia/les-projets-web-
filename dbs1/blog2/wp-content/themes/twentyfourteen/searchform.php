<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>



  <form class="navbar-form pull-left form-search" autocomplete="off"  action="<?php bloginfo('url'); ?>" method="get" accept-charset="utf-8">

<input class="search" data-provide="typeahead" data-items="4"  type="search" name="s"  id="s" acceskey="s" value="RECHERCHER" onFocus="if(this.value=='RECHERCHER')this.value=''" onBlur="if(this.value=='')this.value='RECHERCHER'" >
<input type="submit" class="boutton" value="RECHERCHE">
</form>
