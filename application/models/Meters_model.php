<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meters_model extends CI_Model {

	public function getMeters() {
		$this->db->select("m.*, CONCAT(a.names,' ',a.firstname, ' ',a.lastname) as names, a.appletree as appletree, a.lote as lote, a.address as address");
		$this->db->from("meters m");
		$this->db->join("affiliates a", "m.id_affiliate=a.id");
		$this->db->where("m.status", 1);
		$resultados =$this->db->get();
		return $resultados->result();
	}

    public function getAffiliates(){
		$this->db->where("status", 1);
		$resultados =$this->db->get("affiliates");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("meters", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("meters", $data);
	}

}