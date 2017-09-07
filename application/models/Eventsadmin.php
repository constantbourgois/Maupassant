<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Eventsadmin extends CI_Model
{

    public $table = 'events';
    /*public $table2 = 'event_info';*/

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
		$q = $query->row();
		$q->date = date("d/m/Y",strtotime($q->date));
		return $q;
    }

    function listEvents()
    { 
	
	//select your colum as new column name wich is converted as str ot date
	   
	 
	 $this->db->where('date <>', '');
	 $this->db->order_by('date','ASC');
	 $q = $this->db->get('events')->result();
		
	
	 $this->db->where('date =', '');
	 $this->db->order_by('view_rank','ASC');
	 $q2 = $this->db->get('events')->result();
		
	 $q3=array_merge($q,$q2);
		
	 return $q3;
    }

    /*function getEventinfo()
    {
    
        $query = $this->db->get('event_info');
        return $query->row();
    }*/

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
    /*public function event_info_update($data)
    {
        $this->db->update($this->table2, $data, "id = 1");
        return $this->db->affected_rows();
    }*/

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
