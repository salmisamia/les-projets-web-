<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mediatheque extends CI_Controller {

	private function breadcrumb_entries($max_uri_segment)
	{
		$count_segment = 1;
		$breadcrumb = array();
		while ( $this->uri->segment($count_segment) && $count_segment <= $max_uri_segment )
		{ 
			if ($count_segment == 1)  
			{
				$breadcrumb['entry'][$count_segment]['url'] = base_url() . $this->uri->segment($count_segment);
				$breadcrumb['entry'][$count_segment]['page_name'] = 'Véhicules particuliers';
			}
			$count_segment++;	
		}
		return $breadcrumb;
	}

	public function index()
	{
    	$this->load->view('templates/header', array('header_class' => ""));
    	//$this->load->view('templates/breadcrumb', $breadcrumb_entries);
    	$this->load->view('mediatheque');
		$this->load->view('templates/footer');	
	}
}

/* End of file Page.php */
/* Location: ./application/controllers/page.php */
