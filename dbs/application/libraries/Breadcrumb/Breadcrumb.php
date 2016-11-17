<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
* Generate BreadCrum From URL
* Based on 3 levels of segments
*/

class Breadcrumb 
{
	private $uri_max_segment = 3;
	private $uri_start_segment = 1;

	public function __construct()
	{
		$CI =& get_instance(); // Get an instance of Codeigniter super objetc

		$CI->load->helper('url');
		$CI->load->model('page_model');
		$CI->load->model('sub_page_model');
		$CI->load->model('sub_sub_page_model');
	}

	/*
	* Generate BreadCrumb Entries From URL Segments
	*/
 	public function get_entries()
	{
		$breadcrumb = array();
		$current_segment = $this->uri_start_segment;
		$max_uri_segment = $this->uri_max_segment;

		global $CI; // Globalize the CI Variable

		while ( ($page_slug_name = $CI->uri->segment($current_segment)) && $current_segment <= $max_uri_segment )
		{ 
			switch ($current_segment) // Test what is current segment to get page, sub or sub sub page name.
			{
				case 1 : $page_name = $CI->page_model->get_page_name($page_slug_name); break;
				case 2 : $page_name = $CI->sub_page_model->get_sub_page_name($page_slug_name); break;
				case 3 : {
					if ( $CI->uri->segment($current_segment-1) == 'a-la-une' )
						$page_name = "";
					else
						$page_name = $CI->sub_sub_page_model->get_sub_sub_page_name($page_slug_name);
					break;	 
				}
				default : $page_name = ''; break;
			}
			if ($current_segment > 1) // Build Url
			{
				$breadcrumb['entry'][$current_segment]['url'] = base_url(); // Base url for all page
				for ($i=1; $i < $current_segment; $i++) 
				{ 
					$breadcrumb['entry'][$current_segment]['url'] .= $CI->uri->segment($i) . '/'; // Concatenate base Url with previous segements
				}
				$breadcrumb['entry'][$current_segment]['url'] .= $page_slug_name;
			}	
			elseif ($current_segment == 1)
				$breadcrumb['entry'][$current_segment]['url'] = base_url() . $page_slug_name;

			$breadcrumb['entry'][$current_segment]['page_name'] = ucfirst($page_name); // Build Page Finale Name
			if ( !($CI->uri->segment($current_segment+1)) )
				$breadcrumb['entry'][$current_segment]['isLast'] = 1;
			
			$current_segment++;	// Go to next segment
		}
		return $breadcrumb;
	}	
}

/* End of file Someclass.php */