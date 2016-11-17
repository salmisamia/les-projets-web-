<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resetpass extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
 

   if ($this->form_validation->run() == FALSE)
   {
        
    $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
    

    $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
    $this->load->view('lostpassword');
    
    $this->load->view('templates/footer');  
   }
   
    else
    {
      
    $this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();
    

    $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
    $this->load->view('resetdone');
    
    $this->load->view('templates/footer');  
    }
} }


 


