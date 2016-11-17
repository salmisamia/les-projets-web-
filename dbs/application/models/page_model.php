<?php 
/* 
* Class : Page_model
* Database name : page, sub_page
*/  

class Page_model extends CI_Model 
{
	private $page_details = array();

	public function __construct()
	{      
    	parent::__construct();
	}

	/*
	* Function : init()
	* Initialise l'objet vehicule suivant son nom;
	*/

	public function init($page_name_slug, $have_sub_pages = true) 
	{
	    $this->db->from('page');
	    if ($have_sub_pages)
	    	$this->db->join('sub_page', 'sub_page.page_id = page.ID');
	    $this->db->where('page_name_slug', $page_name_slug);
	    $query = $this->db->get();

	    foreach ($query->result_array() as $row => $value)
	    {
	        $this->page_details[$row] = $value;
	    }        

	    return $this->page_details;
	}

	/*
	* Return Page Name From His Slug Name
	*/
	public function get_page_name($page_slug_name)
	{
		$this->db->from('page');
	    $this->db->where('page_name_slug', $page_slug_name);
	    $query = $this->db->get();
	    $res = $query->result_array();
		return $res[0]['page_name'];
	}

	public function get_children() 
	{
		$this->db->from('sub_page');
		$this->db->where('page_id', $this->page_details[0]['page_id']);
		$query = $this->db->get();

		return $query->result_array();		
	}
}
?>