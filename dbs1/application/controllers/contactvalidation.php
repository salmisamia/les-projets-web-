<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactvalidation extends CI_Controller 
{


	public function index()
	{ $nom = $this->input->post('nom');
	 $prenom = $this->input->post('prenom');
	  $email = $this->input->post('email');
	   $raison = $this->input->post('raison');
        $message = $this->input->post('message');
	 $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('contactvalidation', array('nom' => $nom,'prenom' => $prenom, 'email' => $email,'raison'=> $raison, 'message'=> $message));
		
		$this->load->view('templates/footer');	
	


}}