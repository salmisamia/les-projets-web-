<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devisvalidation extends CI_Controller 
{


	public function index()
	{ $nom = $this->input->post('nom');
	 $couleur = $this->input->post('couleur');
	  $clim = $this->input->post('clim');
	   $autre = $this->input->post('autre');

	 $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('devisvalidation', array('nom' => $nom,'couleur' => $couleur, 'clim' => $clim, 'autre' => $autre));
		
		$this->load->view('templates/footer');	
	


}}