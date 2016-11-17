<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rechercher extends CI_Controller {

	public function index()
	{   

		$form_data = $this->input->post('search_value');
     
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('rechercher', array('form_data' => $form_data));
		
		$this->load->view('templates/footer');	

		/*
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('singlea', array('tit' => $tit));
		
		$this->load->view('templates/footer');		*/
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */