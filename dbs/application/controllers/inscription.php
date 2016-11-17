<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription extends CI_Controller {

	

	public function index()
	{		
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('inscription');
		
		$this->load->view('templates/footer');	

	}
}

/* End of file homr.php */
/* Location: ./application/controllers/home.php */