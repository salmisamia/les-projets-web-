<?php
/* 
* Class : Gamme
* Database name : vehicule
*/  

class Gamme_model extends CI_Model {

    private $gamme_name;
    private $gamme_name_slug;
    private $gamme_list = array();
    private $modele_list = array();

    public function __construct()
    {      
        parent::__construct();
    }

    public function init($gamme_name_slug)
    {
        // Récupère les infos d'une gamme
        $this->db->from('vehicule');
        $this->db->where('gamme_name_slug', $gamme_name_slug);
        $query = $this->db->get();

        $query_result = $query->result_array();
        
        // Initialise le nom et le nom slug de la gamme
        $this->gamme_name = $query_result[0]['gamme_name'];
        $this->gamme_name_slug = $query_result[0]['gamme_name_slug'];

        return $query->result_array();        
    }   

    /*
    * Function : get_vehicules()
    * Retourne la liste de tous les vehicules d'une gamme
    */

    public function get_vehicules()
    {
        // Récupère la listes des Vehicules d'une Gamme 
        $this->db->from('vehicule');
        $this->db->where('gamme_name_slug', $this->gamme_name_slug);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_gammes()
    {
        $this->db->distinct();
        $this->db->select('gamme_name, gamme_name_slug');
        $this->db->from('vehicule');
        $query = $this->db->get();

        $this->gamme_list = $query->result_array();

        return $this->gamme_list;
    }

    public function get_modeles()
    {
        $this->db->distinct();
        $this->db->select('modele_name, modele_name_slug');
        $this->db->from('vehicule');
        $this->db->where('gamme_name_slug', $this->gamme_name_slug);
        $query = $this->db->get();

        foreach ($query->result_array() as $row => $value) 
        {
            $this->modele_list[$row]['modele_name'] = $value['modele_name'];
            $this->modele_list[$row]['modele_name_slug'] = $value['modele_name_slug'];        
        }

        return $this->modele_list;
    }

} 

/* End of file gamme.php */
/* Location: ./application/models/gamme.php */
