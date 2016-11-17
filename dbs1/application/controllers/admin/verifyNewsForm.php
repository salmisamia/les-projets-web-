<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyNewsForm extends CI_Controller {

function __construct()
{
  parent::__construct();
  
  $this->load->library('Simplenews'); // Init SimpleNews Library
  $this->simplenews->set_url_path(''); // Set News Url

}

function index()
{
 //This method will have the credentials validation
 $this->load->library('form_validation');

 $this->form_validation->set_rules('title', 'Titre', 'trim|required');
 $this->form_validation->set_rules('body', 'Contenu', 'required');

 if ($this->form_validation->run() == FALSE)
 {
   //Field validation failed. User redirected to login page
   $this->load->view('admin/news/form_add_news');
 }
 else
 {
    $news_title = $this->input->post('title');
    $news_body = $this->input->post('body');
    $news_id = $this->input->post('id');
    $this->input->post('is_update') ? $is_update = true : $is_update = false;

    if (!$is_update) // News Insertion
    {  
      if ( $this->simplenews->add($news_title, $news_body) ) // News Succesfuly Inserted 
      { 
        // Go to Admin News page
        redirect('admin/news/news', 'refresh');
      }
    }
    else // News Update
      if ( $this->simplenews->update($news_id, $news_title, $news_body) ) // News Succesfuly Inserted 
        { 
          // Go to Admin News page
          redirect('admin/news/news', 'refresh');
        }   

 }

}

}
?>
