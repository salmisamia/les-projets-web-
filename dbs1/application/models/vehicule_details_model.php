<?php
/* 
* Class : Vehicule_details_model
* Database name : vehicule_details
*/  

class Vehicule_details_model extends CI_Model {

    private $vehicule_details = array();

    public function __construct()
    {      
        parent::__construct();
    }

    /*
    * Function : init()
    * Initialise l'objet vehicule suivant son nom;
    */

    public function init($ID_veh) 
    {
        $this->db->from('details_vehicule');
        $this->db->where('id_veh', $ID_veh);
        $query = $this->db->get();

        foreach ($query->result_array() as $row => $value)
        {
            $this->vehicule_details[$row] = $value;
        }        

        return $this->vehicule_details;
    }

}

/* End of file vehicule.php */
/* Location: ./application/models/vehicule.php */
