<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliates_model extends CI_Model {

	public function getAffiliates() {
		$this->db->select("a.*");
		$this->db->from("affiliates a");
		$this->db->where("a.status", 1);
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("affiliates", $data);
	}

	public function getAffiliate($id){
		$this->db->select("a.*");
		$this->db->from("affiliates a");
		$this->db->where("a.id", $id);
		$this->db->where("a.status", 1);
		$resultado =$this->db->get();
		return $resultado->row();
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("affiliates", $data);
	}
    


}