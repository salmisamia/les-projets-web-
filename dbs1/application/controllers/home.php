<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('Simplenews');
        $newslist = $this->simplenews->get_latest_news();

		$header_data = array('header_class' =>' pageFull homePage bandeauBlanc '); // Set Global Container Class
		$this->load->view('templates/header', $header_data);
	
		
		$this->load->view('home', array('newslist' => $newslist));
		$this->load->view('templates/footer');		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
