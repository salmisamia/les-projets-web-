<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devisvalidation extends CI_Controller 
{


	public function index()
	{ $nom = $this->input->post('nom');
	 $prenom = $this->input->post('prenom');
	  $email = $this->input->post('email');
	   $vehicule = $this->input->post('vehicule');

	 $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('devisvalidation', array('nom' => $nom,'prenom' => $prenom, 'email' => $email,'vehicule'=> $vehicule));
		
		$this->load->view('templates/footer');	
	


}}