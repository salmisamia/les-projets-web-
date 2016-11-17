<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLoginc extends CI_Controller {

 function __construct()
 {
   parent::__construct();

   $this->load->library('session');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
   $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean|callback_check_database');


    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    //$this->user->login_by_email($email, $password); 
    
    $result = $this->user->login_by_email($email, $password);

    if ( is_array($result) )
    {
       $sess_array = array();
       foreach($result as $row)
       {
         $sess_array = array(
           'logged_in' => true, 
           'email' => $row->email
         );
         $this->session->set_userdata($sess_array);
       }
      redirect(base_url().'compte', 'refresh'); exit;
    }
    elseif (!$result)
    {  

      $this->load->library('Simplenews');
      $newslist = $this->simplenews->get_latest_news();
    
      $erreur="Email ou mot de passe incorect";
      $this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc', 'erreur' => $erreur));
      $this->load->view('compte');
    
      $this->load->view('templates/footer');  
    }


} 

}


 


