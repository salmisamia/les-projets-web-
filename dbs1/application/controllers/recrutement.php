<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recrutement extends CI_Controller 
{
	private $ask_info_contact_mail = 'seo@racinauto.com';
	private $ask_money_contact_mail = 'seo@racinauto.com';

	public function temp_index()
	{
		$page_data = $this->page_model->init('recrutement');

		$page_content = $this->load->view('recrutement', '', true);

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('templates/page_3c', array('page' => $page_data, 'page_content' => $page_content));
		$this->load->view('templates/footer');
	}

	public function index($sub_page_name)
	{
		// Get Page and Sub Page Details
		$page_data = $this->page_model->init('contact');
		$sub_page_data = $this->sub_page_model->init($sub_page_name);

		// Prepare Contact Form Fields 
		$field_civilite_opt = array('Mr' => 'Monsieur', 'Mme' => 'Madame', 'Melle' => 'Mademoiselle');
		$form_fields = array(0 => 
								array('type' => 'Select', 'name' => 'Civilité', 'name_slug' => 'civilite', 'options' => $field_civilite_opt, 'validation' => 'required'),
							 1 => 
							 	array('type' => 'Input', 'name' => 'Nom', 'name_slug' => 'nom', 'validation' => 'required', 'value' => set_value('nom')),
							 2 => 
							 	array('type' => 'Input', 'name' => 'Prénom', 'name_slug' => 'prenom', 'validation' => 'required'),
							 3 =>
							 	array('type' => 'Input', 'name' => 'E-mail', 'name_slug' => 'email', 'validation' => 'required'),
							 4 => 
							 	array('type' => 'Input', 'name' => 'Raison du contact', 'name_slug' => 'raison-contact', 'validation' => 'required'),
							 5 =>
							 	array('type' => 'Textarea', 'name' => 'Message', 'name_slug' => 'message', 'validation' => 'required')	
							 		 
							 );
		if (isset($_POST['form-submit']))
		{
			$this->load->library('form_validation');

			// Setting Validation Rules
			$this->form_validation->set_rules($form_fields[1]['name_slug'], $form_fields[1]['name'], 'required|max_length[25]');
			$this->form_validation->set_rules($form_fields[2]['name_slug'], $form_fields[2]['name'], 'required|max_length[25]');
			$this->form_validation->set_rules($form_fields[3]['name_slug'], $form_fields[3]['name'], 'required|valid_email|max_length[50]');
			$this->form_validation->set_rules($form_fields[4]['name_slug'], $form_fields[4]['name'], 'required|max_length[100]');
			$this->form_validation->set_rules($form_fields[5]['name_slug'], $form_fields[5]['name'], 'required|max_length[500]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$form_view = $this->load->view('templates/webform', array('form_fields' => $form_fields), true);
			}
			else
			{
				switch ($sub_page_name)	
				{
					case 'demande-information' : $mailto = $this->ask_info_contact_mail; break;
					case 'demande-financement' : $mailto = $this->ask_money_contact_mail; break;
				}
				$this->send_msg($_POST, $mailto);
				$form_view =  $this->load->view('webform/formsuccess', true);
			}

		}
		else
			$form_view =  $this->load->view('templates/webform',array('form_fields' => $form_fields), true);

		// Load Templates
		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));
		$this->load->view('templates/page_3c', array('page' => $page_data, 'sub_page_item' => $sub_page_data, 'page_content' => $form_view));
		$this->load->view('templates/footer');
	}

	/* 
	* Validate Message Form Data and Send Message 	
	*/

	private function send_msg($form_data, $mailto)
	{
		$this->load->library('email');

		// Email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.racinauto.com';
		$config['smtp_user'] = 'seo@racinauto.com';
		$config['smtp_pass'] = 'racinauto-seo-u-001';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		// Email Data
		$this->email->from($form_data['email'], $form_data['nom'].' '.$form_data['prenom']);
		$this->email->to($mailto); 

		$this->email->subject($mailto['raison-contact']);
		$this->email->message($mailto['message']);	

		if ($this->email->send())
			return true;
	}

}