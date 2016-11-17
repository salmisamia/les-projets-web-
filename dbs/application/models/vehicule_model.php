<?php
/* 
* Class : Vehicule
* Database name : vehicule
*/  

class Vehicule_model extends CI_Model {

    private $vehicule_details = array();

    public function __construct()
    {      
        parent::__construct();
    }

    /*
    * Function : init()
    * Initialise l'objet vehicule suivant son nom;
    */

    public function init($vehicule_name_slug) 
    {
        $this->db->from('vehicule');
        $this->db->where('vehicule_name_slug', $vehicule_name_slug);
        $query = $this->db->get();

        foreach ($query->result_array() as $row => $value)
        {
            $this->vehicule_details[$row] = $value;
        }        

        return $this->vehicule_details;
    }

    /*
    * Retourne la liste des véhicules en promo.
    */
    public function get_veh_promo()
    {
        $this->db->from('vehicule');
        $this->db->where('vehicule_promo >', '0');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    /*
    * Return Vehicule Slug Name
    * @input: vehicule modèle name slug
    * @output: vehicule name slug 
    */
    public function get_vehicule_slug_name($modele_name)
    {
        $this->db->from('vehicule');
        $this->db->where('modele_name_slug', $modele_name);
        $query = $this->db->get();
        $res = $query->result_array();
        
        return $res[0]['vehicule_name_slug'];
    }

    /*
    * Retourne les infos de base d'un vehicule.
    */

    public function get_info()
    {

    }

    /*
    * Retourne les infos détaillés d'un véhicule suivant la page demandée
    */

    public function get_details($page_name)
    {

    }
}

/* End of file vehicule.php */
/* Location: ./application/models/vehicule.php */
