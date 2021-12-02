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

	public function getMeter($id){
		$this->db->select("m.*");
		$this->db->from("meters m");
		$this->db->join("affiliates a", "m.id_affiliate=a.id");
		$this->db->where("m.id", $id);
		$this->db->where("m.status", 1);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getReading($meter){
		$this->db->select("r.*, m.p_reading as p_reading");
	    $this->db->from("reading r");
	    $this->db->join("meters m", "r.id_meter = m.id");
	    $this->db->where("r.id_meter", $meter);
	    $this->db->order_by('id', "desc");
	    $this->db->limit(1);
	    $resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("meters", $data);
	}

}