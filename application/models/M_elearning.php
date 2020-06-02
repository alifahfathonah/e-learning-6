<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_elearning extends CI_Model {

	public function saveData($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function getData($data,$table)
	{
		$this->db->where($data);
		$this->db->from($table);
		return $this->db->get();
	}

	public function getDataAll($table,$id=null)
	{
		$this->db->from($table);
		if($id){
			$this->db->where('id',$id);
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function updateData($params,$table,$data)
	{
		
		$this->db->where($params);
		return $this->db->update($table,$data);
	}

	public function deleteData($params,$table)
	{
		
		$this->db->where($params);
		return $this->db->delete($table);
	}

	public function saveDataGetId($table,$data)
	{
		 $this->db->insert($table,$data);
		return $this->db->insert_id();
	}
}
