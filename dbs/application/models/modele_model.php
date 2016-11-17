<?php
/* 
* Class : modele
* Database name : vehicule
*/  

class Modele_model extends CI_Model {

    private $modele_name;
    private $modele_name_slug;
    private $modele_list = array();

    public function __construct()
    {      
        parent::__construct();
    }

    public function init($modele_name_slug)
    {
        // Récupère les infos d'une modele
        $this->db->from('vehicule');
        $this->db->where('modele_name_slug', $modele_name_slug);
        $query = $this->db->get();

        $query_result = $query->result_array();
        
        // Initialise le nom et le nom slug de la modele
        $this->modele_name = $query_result[0]['modele_name'];
        $this->modele_name_slug = $query_result[0]['modele_name_slug'];

        return $query->result_array();        
    }   

    /*
    * Function : get_vehicules()
    * Retourne la liste de tous les vehicules d'une modele
    */

    public function get_vehicules()
    {
        // Récupère la listes des Vehicules d'une modele 
        $this->db->from('vehicule');
        $this->db->where('modele_name_slug', $this->modele_name_slug);
        $query = $this->db->get();

        return $query->result_array();
    }

} 

/* End of file modele.php */
/* Location: ./application/models/modele.php */
