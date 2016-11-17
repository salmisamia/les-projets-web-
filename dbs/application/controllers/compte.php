<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compte extends CI_Controller {
      
	private $user_logged = false;

	public function __construct()
	{
		parent::__construct();
		 $this->load->library('session');

		if ( $this->user->_is_logged_in() )
			$this->user_logged = true;
	}

	public function index()
	{   
		
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
	    
	  
		if( $this->user_logged ) {  
			$this->load->view('espaceclient'); 
		} 
		else
		{
			$this->load->view('compte');
		}
		
		$this->load->view('templates/footer');	

		/*
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('singlea', array('tit' => $tit));
		
		$this->load->view('templates/footer');		*/
	}

	public function deconnexion()
	{
		if( $this->user_logged ) { 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('email');

			redirect(base_url().'compte','refresh');
 		} 
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */