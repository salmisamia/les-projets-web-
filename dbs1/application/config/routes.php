<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

// Routes pour les pages véhicules
$route['vehicules-particuliers/(:any)/(:any)'] = "vehicule/presentation/$1/$2";
$route['vehicules-utilitaires/(:any)/(:any)'] = "vehicule/presentation/$1/$2";
$route['vehicules-dacia/(:any)/(:any)'] = "vehicule/presentation/$1/$2";

// Routes pour les pages véhicules
$route['vehicules-particuliers/(:any)'] = "vehicule/presentation/$1";
$route['vehicules-utilitaires/(:any)'] = "vehicule/presentation/$1";
$route['vehicules-dacia/(:any)'] = "vehicule/presentation/$1";

// Routes pour les pages de Gammes
$route['vehicules-particuliers'] = "gamme/index";
$route['vehicules-utilitaires'] = "gamme/index";
$route['vehicules-dacia'] = "gamme/index";

$route['contact/(:any)'] = "contact/index/$1";
$route['recrutement/(:any)'] = "recrutement/temp_index";
$route['recrutement'] = "recrutement/temp_index";

$route['apres-vente/(:any)'] = "apres_vente/$1";
$route['apres-vente/(:any)/(:any)'] = "apres_vente/index/$1/$2";

$route['decouvrez-racinauto/a-la-une/(:any)'] = "decouvrez_racinauto/show_news/$1";
$route['racinauto-entreprise/(:any)'] = "racinauto_entreprise/index/$1";
$route['decouvrez-racinauto/(:any)'] = "decouvrez_racinauto/index/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
