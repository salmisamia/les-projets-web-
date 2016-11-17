<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyinscription extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('date');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
   $this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean|matches[passconf]');
   $this->form_validation->set_rules('passconf', 'Confirmer le mot de passe', 'trim|required|xss_clean');
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_check');

   $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
   // $this->form_validation->set_message('matches', 'Le mot de passe et sa confirmation ne correspondent pas');
   $this->form_validation->set_message('valid_email', "L'adresse mail n'est pas valide");

   if ($this->form_validation->run() == FALSE)
   {
   $this->load->library('Simplenews');
   $newslist = $this->simplenews->get_latest_news();
    

    $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
    $this->load->view('inscription');
    
    $this->load->view('templates/footer');  
   }
   else
   { 
   $this->user->add($this->input->post());
   $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
    

    $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
    $this->load->view('inscriptiondone');
    
    $this->load->view('templates/footer');  
     }

     
   } }

