<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modele extends CI_Controller {

	private function breadcrumb_entries($max_uri_segment)
	{
		$count_segment = 1;
		$breadcrumb = array();
		while ( $this->uri->segment($count_segment) && $count_segment <= $max_uri_segment )
		{ 
			if ($count_segment == 1)  
			{
				$breadcrumb['entry'][$count_segment]['url'] = base_url() . $this->uri->segment($count_segment);
				$breadcrumb['entry'][$count_segment]['page_name'] = 'Véhicules particuliers';
			}
			$count_segment++;	
		}
		return $breadcrumb;
	}

	public function index($modele_name)
    {
    	// Initialise l'objet modele avec le nom slug de la modele	
    	$modele_details = $this->modele_model->init($modele_name);
    	
    	// Récupère la liste des véhicules de la modele
    	$modele_veh = $this->modele_model->get_vehicules();

    	// Données à afficher dans la vue
    	$modele_page_data = array('modele_name' => $modele_details[0]['modele_name'], 'modele_name_slug' => $modele_details[0]['modele_name_slug'], 'veh_list' => $modele_veh);
    	
    	// Set breadcrumb entries
    	$breadcrumb_entries = Modele::breadcrumb_entries(3,$modele_details);

    	$this->load->view('templates/header');
    	$this->load->view('templates/breadcrumb', $breadcrumb_entries);
    	$this->load->view('modele', $modele_page_data);
		$this->load->view('templates/footer');	
    }
}

/* End of file Modele.php */
/* Location: ./application/controllers/page.php */
