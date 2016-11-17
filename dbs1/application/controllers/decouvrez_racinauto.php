<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decouvrez_racinauto extends CI_Controller {

	public function index($sub_page_name)
	{
		// Init Current Sub Sub Page Object
        $current_page = $this->sub_page_model->init($sub_page_name);
        
        $page = $this->page_model->init('decouvrez-racinauto'); // Init the Parent Page Object

        $s_pages = $this->page_model->get_children(); // Get Sub pages of current Parent Page
           	
        $header_data = array('header_class' =>' pageNav bandeauBlanc '); // Set Global Container Class
    	$breadcrumb_entries = $this->breadcrumb->get_entries(); // Set breadcrumb entries

        $page_content_right = '';
        
        if ($sub_page_name == 'a-la-une') { 
            $page_content = $this->get_news();
        } 
        else
            $page_content = $this->load->view('decouvrez-racinauto/'.$sub_page_name.'/'.$sub_page_name, '', true);

        $page_data = array('page' => $current_page[0], 's_page' => $s_pages, 'page_content' => $page_content, 'page_right_content' => $page_content_right);  // Data to display in View
        
        // Load Templates
    	$output = $this->load->view('templates/header', $header_data, true);
    	$output .= $this->load->view('templates/breadcrumb', $breadcrumb_entries, true);
        if ($sub_page_name == 'reseau')
            $output.= $this->load->view('reseau', $page_data, true);
        else
    	   $output.= $this->load->view('templates/page_3c_v3', $page_data, true);
		$output .= $this->load->view('templates/footer', '', true);

        $this->output->set_output($output);
	}

    public function show_news($news_title)
    {
        $sub_page_name = 'a-la-une';
        // Init Current Sub Sub Page Object
        $current_page = $this->sub_page_model->init($sub_page_name);
        
        $page = $this->page_model->init('decouvrez-racinauto'); // Init the Parent Page Object

        $s_pages = $this->page_model->get_children(); // Get Sub pages of current Parent Page
            
        $header_data = array('page_title' => 'Actualité - Racinauto Agent Renault Algérie - Vente véhicules Renault et Dacia', 'header_class' =>' page2colsNav bandeauBlanc pageEdito '); // Set Global Container Class
        $breadcrumb_entries = $this->breadcrumb->get_entries(); // Set breadcrumb entries

        $page_content_right = '';

        $page_content = $this->get_news($news_title);
        if ($news_title != "")
            $socialshare = $this->load->view('templates/socialshare', array('url_to_share' => 'http://racinauto.com/decouvrez-racinauto/a-la-une/'.$news_title), true);
        $page_data = array('page' => $current_page[0], 's_page' => $s_pages, 'page_content' => $page_content, 'page_right_content' => $page_content_right, 'socialshare' => $socialshare);  // Data to display in View
        
        // Load Templates
        $output = $this->load->view('templates/header', $header_data, true);
        $output .= $this->load->view('templates/breadcrumb', $breadcrumb_entries, true);
        $output.= $this->load->view('templates/page_3c_v3', $page_data, true);
        $output .= $this->load->view('templates/footer', '', true);

        $this->output->set_output($output);
    }

    private function get_news($news_title=null)
    {
        $this->load->library('Simplenews');
        $this->simplenews->set_url_path(''); // Set News Url
        
        $data_tmpl = array('open'=>'<span>',
            'title_start'=>'<h2>',
            'title_end'=>'</h2>',
            'body_start'=>'<p>',
            'body_end'=>'</p>',
            'all_tags_start'=>'>>',
            'tag_end'=>'</span>',
            'tag_start'=>'<span>',
            'all_tags_end'=>'<<',
            'close'=>'<span>',
            'set_title_links'=>TRUE);

        $this->simplenews->set_template($data_tmpl);

        $data = array('limit'=>10);
        if ($news_title)
        {
            $news = $this->load->view('templates/news', array('news' => $this->simplenews->generate_from_title($news_title)), true);
        } 
        else    
        {
            $news = $this->load->view('templates/news', array('news' => $this->simplenews->generate($data)), true);
        }
        return $news;
    }

}