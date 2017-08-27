<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class User extends CI_Model {

    function login($email, $password) {
    
        $this->db->select('id, name, password,email');
        $this->db->from('users');
        $this->db->where('email', $email);

        $this->db->limit(1);

        if (!($query = $this->db->get())){


          return FALSE;
        }

        $result = $query ->result();

        $hash = $result[0]->password;

        if (password_verify($password, $hash)) {

          return $result;
        }
        else {

          return FALSE;
        }



    }

}

?>
