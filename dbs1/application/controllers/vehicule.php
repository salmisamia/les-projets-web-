<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicule extends CI_Controller {

	public function presentation($modele_name, $vehicule_name=null, $page=null)
	{
        if (!$vehicule_name) // Requette pour la page modèle
        {
            // Trouver la page vehicule par default du modèle
            $vehicule_name = $this->vehicule_model->get_vehicule_slug_name($modele_name); 
        }    
		// Get Page and Sub Page Details
		$sub_page_data = $this->sub_page_model->init($vehicule_name);

    	// Initialise l'objet vehicule avec le nom slug de la vehicule	
    	$vehicule_details = $this->vehicule_model->init($vehicule_name);
        $vehicules_details_2 = $this->vehicule_details_model->init($vehicule_details[0]['ID']);
    
    	// Données à afficher dans la vue
    	$vehicule_page_data = array('vehicule_details' => $vehicule_details, 'vd_2' => $vehicules_details_2[0]);

    	$header_data = array('header_class' =>' page2colsNav  bandeauBlanc  ', 'v_color_code' => $vehicule_details[0]['v_color_code']);
    	
    	// Set breadcrumb entries
    	$breadcrumb_entries = $this->breadcrumb->get_entries();

    	$this->load->view('templates/header', $header_data);
    	$this->load->view('templates/breadcrumb', $breadcrumb_entries);
    	$this->load->view('vehicule', $vehicule_page_data);
		$this->load->view('templates/footer');
	}

}

/* End of file vehicule.php */
/* Location: ./application/controllers/vehicule.php */
