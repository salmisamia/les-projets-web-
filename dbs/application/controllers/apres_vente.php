<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apres_vente extends CI_Controller {

	public function index()
	{ 
	 $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
        

        $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
        $this->load->view('apres-vente');
        
        $this->load->view('templates/footer');  	
	}

  
}

/* End of file apres_vente.php */
/* Location: ./application/controllers/apres_vente.php */
