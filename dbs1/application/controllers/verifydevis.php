<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifydevis extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('date');
 }

 function index()
 {
  echo "bjr";exit;
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
   $this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean');
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_check');

   $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
   // $this->form_validation->set_message('matches', 'Le mot de passe et sa confirmation ne correspondent pas');
   $this->form_validation->set_message('valid_email', "L'adresse mail n'est pas valide");

   if ($this->form_validation->run() == FALSE)
   {
    $this->display_form(false);
   }
   else
   { 
    
     }

     
}

public function display_form($succes)
{
    echo "succes";
}
}
?>
