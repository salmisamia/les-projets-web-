<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data = array(); // Session Data

class News extends CI_Controller {

public function __construct()
{
  parent::__construct(); 

  global $data;
  if ($this->session->userdata('logged_in'))
  {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    
    $this->load->library('Simplenews'); // Init SimpleNews Library
    $this->simplenews->set_url_path(''); // Set News Url
  }
  else
  {
    // If no session, redirect to login page
    redirect('login', 'refresh');
  } 
}

/*
* Load News Page Views
* @input view name, view content
* @output Html
*/
private function display_page($view, $content)
{
  global $data;

  $this->load->view('admin/header', $data);
  $this->load->view('admin/'.$view, array('page_content' => $content));
  $this->load->view('admin/footer');
}

/*
* Get All News
* @input none
* @output array of news
*/
public function index()
{
    $news = $this->simplenews->get_news(10, 0); // Get 10 News in Order Descedante
    
    $page_content = $this->load->view('admin/news/news', array('newslist' => $news, 'is_archive' => false), true);
    $this->display_page('news', $page_content);
}

/*
* Archives a News
* @input News ID
* @ouput Array of news
*/
public function archive($id_news)
{
  $this->simplenews->archive_news($id_news);
  
  redirect('admin/news/archives', 'refresh');  
}

/*
* Publish a News
* @input News ID
* @ouput Array of news
*/
public function publish($id_news)
{
  $this->simplenews->publish_news($id_news);
  
  redirect('admin/news/news', 'refresh');  
}

/*
* Get the Archived News
* @input none
* @ouput Array of news
*/
public function archives()
{
  $news = $this->simplenews->get_archived_news(10, 0);

  $page_content = $this->load->view('admin/news/news', array('newslist' => $news, 'is_archive' => true), true);
  $this->display_page('news', $page_content);
}

/*
* Display Form Add news
* @input News data
* @ouput News
*/
public function add_news($news_data=null)
{
  $page_content = $this->load->view('admin/news/form_add_news','', true);
  $this->display_page('news', $page_content);
}

public function update($id_news)
{
  $news_data = $this->simplenews->get_news_by_id($id_news);

  $page_content = $this->load->view('admin/news/form_update_news',$news_data[0], true);
  $this->display_page('news', $page_content);
}

}