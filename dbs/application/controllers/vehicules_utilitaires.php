<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicules_utilitaires extends CI_Controller {

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
		

		$this->load->view('templates/header', array('header_class' => 'pageEditoNav  bandeauBlanc'));

		if (isset($_POST['valider']))
		{
			$prix_min = $_POST['prix_min'];
			$prix_max = $_POST['prix_max'];

			$this->load->view('vehicules_utilitaires',array('prix_min' => $prix_min, 'prix_max' => $prix_max));

		}
		else
			$this->load->view('vehicules_utilitaires');
		
		$this->load->view('templates/footer');		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */