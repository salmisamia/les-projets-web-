<?php

/* 
* Class vehicule_particulier
* Table name : vehicule
* Tables connected : gamme, modele
*/

class Vehicule_particulier extends Vehicule {

	private $gamme_id = "1";

    function __construct($id_veh)
    {
        $this->db->query("SELECT * FROM vehicule WHERE ID = $this->gamme_id");
    }

    /*
    * Retourne les infos de base d'un vehicule
    */

    public function getInfo()
    {

    }

    /*
    * Retourne les infos détaillés d'un véhicule suivant la page demandée
    */

    public function getDetails($page_name)
    {

    }
}

?>
