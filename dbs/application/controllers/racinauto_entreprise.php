<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Racinauto_entreprise extends CI_Controller {

	public function index($sub_page_name)
	{
		// Init Current Sub Sub Page Object
        $current_page = $this->sub_page_model->init($sub_page_name);
        
        $page = $this->page_model->init('racinauto-entreprise'); // Init the Parent Page Object

        $s_pages = $this->page_model->get_children(); // Get Sub pages of current Parent Page
           	
        $header_data = array('header_class' =>' page2colsNav  bandeauBlanc pageEdito'); // Set Global Container Class
    	$breadcrumb_entries = $this->breadcrumb->get_entries(); // Set breadcrumb entries
        $page_content = $this->load->view('racinauto-entreprise/'.$sub_page_name.'/'.$sub_page_name,'', true);
        $page_right_content = $this->load->view('racinauto-entreprise/page_right_content', '', true);

        $page_data = array('page' => $current_page[0], 's_page' => $s_pages, 'page_content' => $page_content, 'page_right_content' => $page_right_content);  // Data to display in View

        // Load Templates
    	$this->load->view('templates/header', $header_data);
    	$this->load->view('templates/breadcrumb', $breadcrumb_entries);
    	$this->load->view('templates/page_3c_v3', $page_data);
		$this->load->view('templates/footer');
	}

}

/* End of file apres_vente.php */
/* Location: ./application/controllers/apres_vente.php */
