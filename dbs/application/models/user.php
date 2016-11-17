<?php

Class User extends CI_Model
{

 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if ($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function add($membre_data)
    {
        $datestring = "%Y-%m-%d";
        $time = time();

        $data = array(
            'id' => null,
            'nom' => $membre_data['nom'],
            'prenom' => $membre_data['prenom'],
            'email' => $membre_data['email'],
            'mot' => md5($membre_data['password']),
        );

        $this->db->insert('utilisateur', $data);
        return $this->db->insert_id();
    }
function get()
    {
        return $this->membre_data;
    }
function login_by_email($email, $password)
{  
      /* echo (MD5($password));exit();*/
        $this->db-> select('email, mot');
        $this->db->from('utilisateur');
        $this->db->where('email', $email);
        $this->db->where('mot', MD5($password));
        $this->db->limit(1);

         $query = $this ->db-> get();
        /* var_dump($query->result());exit();*/
   if ($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
}

function _is_logged_in() 
{ 
  $user_logged = $this->session->userdata('logged_in');
   
   if ($user_logged )
    return true;
  return false;

}

}

?>

