
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

 public function __construct()
 {
   parent::__construct(); 
 }

 public function index()
 {
   if ($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $this->load->view('admin/header', $data);
     $this->load->view('admin/home', $data);
     $this->load->view('admin/footer');
   }
   else
   {
     // If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 /* 
 * Exit Admin Panel
 */
 public function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   
   redirect('login', 'refresh');
 }

}

?>

