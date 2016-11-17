<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotions extends CI_Controller 
{
	public function index()
	{
		// Get Page and Sub Page Details
		$page_data = $this->page_model->init('promotions');
		// Get Promo Cars List
		$promo_list = $this->vehicule_model->get_veh_promo();
		// Load Templates
		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$page_content = $this->load->view('promotions', array('promo_list' => $promo_list), true);
		$this->load->view('templates/page_1c', array('page' => $page_data, 'page_content' => $page_content));
		$this->load->view('templates/footer');
	}
}