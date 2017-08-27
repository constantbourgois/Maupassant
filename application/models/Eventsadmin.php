<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

Class Eventsadmin extends CI_Model {

  var $table = 'events';

  public function get_by_id($id)
  {
    $this->db->from($this->table);
    $this->db->where('id',$id);
    $query = $this->db->get();

    return $query->row();
  }

  function listEvents() {

    $query = $this->db->get('events');
    return $query->result();

  }

  public function createEvent($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function event_update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
  }


}

?>
