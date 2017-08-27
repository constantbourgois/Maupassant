<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class ManageUser extends CI_Model {

    function createUser($data)
    {
      $this->db->insert('users', $data);
      return $this->db->insert_id();
    }

    public function user_update($where, $data)
    {
      $this->db->update('users', $data, $where);
      
      return $this->db->affected_rows();
    }

    public function user_update_password($where, $data)
    {
      $this->db->update('users', $data, $where);
      return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
      $this->db->where('user_id', $id);
      $this->db->delete('users');
    }
    public function listUsers()
    {
      $query = $this->db->get('users');
      return $query->result();

    }

    public function get_by_id($id)
    {
      $this->db->from('users');
      $this->db->where('user_id',$id);
      $query = $this->db->get();

      return $query->row();
    }

}

?>
