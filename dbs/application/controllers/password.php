<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

	
	}

	/*
	* Charge toutes les vues nécessaires à la génération de la page.
	*/
	

	public function index()
	{
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('lostpassword');
		
		$this->load->view('templates/footer');	

	}

	}