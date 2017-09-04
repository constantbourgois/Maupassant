<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Eventsadmin extends CI_Model
{

    public $table = 'events';
    public $table2 = 'event_info';

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function listEvents()
    {  $this->db->from($this->table);
       $this->db->order_by('view_rank','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEventinfo()
    {
    
        $query = $this->db->get('event_info');
        return $query->row();
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
    public function event_info_update($data)
    {
        $this->db->update($this->table2, $data, "id = 1");
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
