<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Readings_model extends CI_Model {

	public function getSearchAffiliate($appletree, $lote) {
		$this->db->select("a.id");
		$this->db->from("affiliates a");
		$this->db->where("a.appletree", $appletree);
        $this->db->where("a.lote", $lote);
        $resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function getMeterList($id) {
		$this->db->select("m.*, CONCAT(a.names,' ',a.firstname, ' ',a.lastname) as names, a.appletree as appletree, a.lote as lote, a.address as address");
		$this->db->from("meters m");
		$this->db->join("affiliates a", "m.id_affiliate=a.id");
		$this->db->where("m.status", 1);
		$this->db->where("m.id_affiliate", $id);
		$resultados =$this->db->get();
		return $resultados->result();
	}


	public function getMeter($id){
		$this->db->select("m.*, CONCAT(names,' ',firstname,' ',lastname) as names, a.id as uid");
		$this->db->from("meters m");
		$this->db->join("affiliates a", "m.id_affiliate=a.id");
		$this->db->where("m.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
    
    public function getReading($meters){
		$this->db->select("r.*, m.p_reading as p_reading");
	    $this->db->from("reading r");
	    $this->db->join("meters m", "r.id_meter = m.id");
	    $this->db->where("r.id_meter", $meters);
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

    public function saver($data){
		return $this->db->insert("reading", $data);
	}

	public function getPrices(){
		$resultado = $this->db->get("prices");
		return $resultado->row();
	}

	public function getQuantityDetail($id_meter, $id_affiliate) {
		$this->db->select("d.*");
	    $this->db->from("details d");
	    $this->db->where("d.id_meter", $id_meter);
		$this->db->where("d.id_affiliate", $id_affiliate);
	    $resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}


}