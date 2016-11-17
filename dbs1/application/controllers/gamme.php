<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gamme extends CI_Controller {

	public function index()
    {
    	$gamme_name = $this->uri->segment(1); 

    	// Initialise l'objet Gamme avec le nom slug de la gamme	
    	$gamme_details = $this->gamme_model->init($gamme_name);

    	// Récupère la liste de toutes les gammes
    	$gammes_list = $this->gamme_model->get_gammes();

    	// Récupère la liste de tout les modèles
    	$modeles_list =$this->gamme_model->get_modeles();
    	
    	// Récupère la liste des véhicules de la gamme
    	$gamme_veh = $this->gamme_model->get_vehicules();

        $header_data = array('header_class' =>' pageNav bandeauBlanc  pageComposant ');

    	// Données à afficher dans la vue
    	$gamme_page_data = array('gamme_name' => $gamme_details[0]['gamme_name'], 'gamme_name_slug' => $gamme_details[0]['gamme_name_slug'], 'gammes_list' => $gammes_list, 'modeles_list' => $modeles_list, 'veh_list' => $gamme_veh);
    	
    	// Set breadcrumb entries
    	$breadcrumb_entries = $this->breadcrumb->get_entries();

    	$this->load->view('templates/header', $header_data);
    	$this->load->view('templates/breadcrumb', $breadcrumb_entries);
    	$this->load->view('gamme', $gamme_page_data);
		$this->load->view('templates/footer');	
    }
}

/* End of file Gamme.php */
/* Location: ./application/controllers/page.php */
