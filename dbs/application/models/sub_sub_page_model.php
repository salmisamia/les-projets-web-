<?php 
/* 
* Class : Sub_sub_page_model
* Database name : sub_page, sub_sub_page
*/  

class Sub_sub_page_model extends CI_Model 
{
	private $sub_sub_page_details = array();

	public function __construct()
	{      
    	parent::__construct();
	}

	/*
	* Function : init()
	* Initialise l'objet sub_page_model suivant son nom
	*/

	public function init($sub_sub_page_name_slug) 
	{
	    $this->db->from('sub_sub_page');
	    $this->db->join('sub_page', 'sub_page.ID = sub_sub_page.sub_page_id');
	    $this->db->join('page', 'page.ID = sub_page.page_id');
	    $this->db->where('sub_sub_page_name_slug', $sub_sub_page_name_slug);
	    $query = $this->db->get();

	    foreach ($query->result_array() as $row => $value)
	    {
	        $this->sub_sub_page_details[$row] = $value;
	    }        

	    return $this->sub_sub_page_details;
	}

	/*
	* Return Page Name From His Slug Name
	*/
	public function get_sub_sub_page_name($sub_sub_page_slug_name)
	{
		$this->db->from('sub_sub_page');
	    $this->db->where('sub_sub_page_name_slug', $sub_sub_page_slug_name);
	    $query = $this->db->get();
	   	$res = $query->result_array();
		return $res[0]['sub_sub_page_name'];
	}

	public function get_all_ss_pages()
	{
		$this->db->from('sub_sub_page');
		$this->db->where('sub_page_id', $this->sub_sub_page_details[0]['sub_page_id']);
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>